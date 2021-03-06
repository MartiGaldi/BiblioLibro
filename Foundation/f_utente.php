<?php
/**
 * La classe f_utente fornisce query per gli oggetti e_utente
 * @author gruppo 11
 * @package Foundation
 */
class f_utente 
{
	/**
     * Query che verifica l'esistenza di un nickname nella tabella utente
     * @return string contenente la query sql
     */
    static function esisteNick() : string
    {
        return "SELECT *
                FROM utente
                WHERE nick = :value ;";
    }
    
	/**
     * Query che verifica l'esistenza di una mail nella tabella utente
     * @return string contenente la query sql
     */
    static function esisteMail() : string
    {
        return "SELECT *
                FROM utente
                WHERE mail = :value ;";
    }
	
    /**
     * Query che effettua il salvataggio di un utente nella tabella utente
     * @return string contenente la query sql
     */
    static function salvaUtente() : string
    {
        return "INSERT INTO utente(nick, mail, password, tipo, nome, cognome, dtNasc, lgNasc, via, citta, cap)
                VALUES (:nick, :mail, :password, :tipo, :nome, :cognome, :dtNasc, :lgNasc, :via, :citta, :cap);";
    }
    
    /**
     * Query che effettua l'aggiornamento di un utente nella tabella utente
     * @return string contenente la query sql
     */
    static function aggiornaUtente() : string
    {
        return "UPDATE utente
                SET nick = :nick, mail = :mail, password = :password, tipo = :tipo nome = :nome, cognome = :cognome, dtNasc = :dtNasc, lgNasc = :lgNasc, via = :via, citta = :citta, cap = :cap
                WHERE id = :id;";
    }
    
    /**
     * Query per il caricamento di un utente
     * @return string sql rappresentante la SELECT.
     */    
    static function caricaUtente() : string
    {
        return "SELECT *
                FROM utente
                WHERE id = :id;";
    }
  
	 
    /**
     * Carica i prestiti di un utente in un array di e_prestito
     * @return string la stringa sql per la SELECT
     */
	 static function caricaPrestito() : string
    {
        return "SELECT *
                FROM prestito, utente
                WHERE prestito.id_prestito = :id AND prestito.id_utente = utente.id ; ";
    }
	
	/**
     * Carica gli storici di un utente in un array di e_storico
     * @return string la stringa sql per la SELECT
     */
	 static function caricaStorico() : string
    {
        return "SELECT *
                FROM storico, utente
                WHERE storico.id_storico = :id AND storico.id_utente = utente.id ; ";
    }
	
	/**
     * Carica i prestiti di un utente in un array di e_prenotazione
     * @return string la stringa sql per la SELECT
     */
	static function caricaPrenota() : string
    {
        return "SELECT *
                FROM prenota, utente
                WHERE prenota.id_prenota= :id AND prenota.id_utente = utente.id; ";
    }
	 
    /**
     * Query che rimuove un utente dalla tabella utente.
     * @return string contenente la query sql
     */
    static function rimuoviUtente() : string
    {
        return "DELETE
                FROM utente
                WHERE id = :id;";
    }
	
   /**
    * Query per la ricerca di un utente dato il nome
	* @return string contenente la query sql
	*/
     static function ricercaUtenteDaNome() : string
    {
        return "SELECT utente.*
                FROM utente
                WHERE LOCATE( :Nome , utente.nome) > 0;";
    }
    
    /**
     * Associazione di un oggetto e_utente ai campi di una query sql per la tabella utente.
     * @param PDOStatement $stmt lo statement contenente i campi da riempire
     * @param e_utente $utente l'utente da cui prelevare i dati
     */
    static function bindValues(PDOStatement &$stmt, e_utente &$utente)
    {
        $stmt->bindValue(':nick', $utente->getNick(), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $utente->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $utente->getPassword(), PDO::PARAM_STR);
		$stmt->bindValue(':nome', $utente->getNome(), PDO::PARAM_STR);
		$stmt->bindValue(':cognome', $utente->getCognome(), PDO::PARAM_STR);
		$stmt->bindValue(':dtNasc', $utente->getDtNasc(), PDO::PARAM_STR);
		$stmt->bindValue(':lgNasc', $utente->getLgNasc(), PDO::PARAM_STR);
		$stmt->bindValue(':via', $utente->getVia(), PDO::PARAM_STR);
		$stmt->bindValue(':citta', $utente->getCitta(), PDO::PARAM_STR);
		$stmt->bindValue(':cap', $utente->getCap(), PDO::PARAM_STR);
        $stmt->bindValue(':tipo', lcfirst(substr(get_class($utente),2)), PDO::PARAM_STR);
    }
    
    /**
     * Istanzia un oggetto e_utente a partire dai valori di una tupla ricevuta dal dbms
     * @param array $ennupla la tupla ricevuta dal dbms
     * @return utente l'oggetto e_utente risultato dell'operazione
     */
    static function creaOggettoDaRiga($riga)
    {
        $uTipo = 'e_'.ucfirst($riga['tipo']);
        
        $utente = new $uTipo();
        
        $utente->setId($riga['id']);
        $utente->setNick($riga['nick']);
        $utente->setMail($riga['mail']);
        $utente->setPassword($riga['password']);
		$utente->setNome($riga['nome']);
		$utente->setCognome($riga['cognome']);
		$utente->setDtNasc($riga['dtNasc']);
		$utente->setLgNasc($riga['lgNasc']);
		$utente->setVia($riga['via']);
		$utente->setCitta($riga['citta']);
		$utente->setCap($riga['cap']);
                                    
        return $utente;
    }
}

?>