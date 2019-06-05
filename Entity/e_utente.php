<?php 

require_once 'inc.php';

/**
* La classe e_utente contiene tutti gli attributi e metodi che sono adoperati da tutte
* le tipologie di utente (cliente, bibliotecario e visitatore).
* Contiene metodi per impostare, ottenere, validare i seguenti attributi:
* - mail: l'indirizzo utilizzato in fase di registrazione
* - password: la password per accedere nell'applicazione
* - ...
* @author gruppo 11
* @package Entity
*/

class e_utente
{
	protected $id;
    protected $nick;
    protected $mail;
    protected $password;
	protected $nome;
	protected $cognome;
	protected $dtNasc;
	protected $lgNasc;
	protected $via;
	protected $citta;
	protected $cap;
    
    function __construct(){}
	
	
    function getId() : int
	{
        if(!$this->id)
            return 0;
        else 
			return $this->id;
    }
    
    function setId(int $id)
	{
        $this->id = $id;
    }
	

    function setNick(string $nick)
    {
        $this->nick = $nick;  
    }
        
    function getNick() : string
    {
        return $this->nick;
    }
	
        
    function setNome (string $nome)
    {
        $this->nome = $nome;  
    }
        
    function getNome() : string
    {
        return $this->nome;
    }
       
	   
	 function setCognome(string $cognome)
    {
        $this->cognome = $cognome;  
    }
        
    function getCognome() : string
    {
        return $this->cognome;
    }
	
    function setMail (string $mail)
    {
        $this->mail = $mail;
    }
    
    function getMail() : string
    {
        return $this->mail;
    }
	
    function validazioneMail() : bool
    {
        if($this->mail && filter_var($this->mail, FILTER_VALIDATE_EMAIL))
            return true;
        else
            return false;
    }
    
    function setPassword (string $password)
    {
        $this->password=$password;
    }
    
    function getPassword() : string
    {
        return $this->password;
    }

    
    /** Metodo che verifica che la password sia corretta ovvero composta da caratteri alfanumerici
     *  ed abbia la lunghezza almeno pari a 6 e massimo 20
     *  @return bool true se la password è corretta, false altrimenti
     */
    function validazionePassword() : bool
    {
        if($this->password && preg_match('/^[[:alnum:]]{6,20}$/', $this->password))
			{ 
				return true;
			}
        
        else
            return false;
    }
    
    /**
     * Metodo che cripta la password
     */
    function hashPassword ()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    
    /**
    * Metodo che controlla se la password dell'oggetto sia corrispondente alla entry nel database
    * che contiene lo stesso id dell'oggetto che ha richiamato il metodo
    * @param string $password la password
    * @return bool
    */
    function checkPassword () : bool
    {
        return password_verify($this->password, f_persistance::getInstance()->carica(e_utente::class, $this->id)->getPassword());
    }
    
	
	
	function setDtNasc(string $dtNasc)
    {
        $this->dtNasc = new DateTime($dtNasc);
    }
        
    function getDtNasc(bool $mostraFormato = null)
    {
        if($this->dtNasc)
        {
            $formato="y-m-d";
            if($mostraFormato)
                $formato= "y/m/d";
            return $this->dtNasc->format($formato);
        }
        else
            return NULL;
    }

     function setLgNasc(string $lgNasc)
     {
            $this->lgNasc=$lgNasc;
     }

     function getLgNasc()
     {
            return $this->lgNasc;
     }
     
	/**
     * Funzione che verifica che il nome utente sia valido. Il nome dell'utente si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il nome utente e' corretto, false altrimenti
     */
     function validazioneNome() : bool
    {
        if ($this->nome && preg_match('/^[a-zA-Z_-]{3,20}$/', $this->nome))
            return true;
        else
            return false;
    }
	
	/**
     * Funzione che verifica che il cognome utente sia valido. Il cognome utente si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il cognome utente e' corretto, false altrimenti
     */
	function validazioneCognome() : bool
    {
        if ($this->cognome && preg_match('/^[a-zA-Z_-]{3,20}$/', $this->cognome))
            return true;
        else
            return false;
    }
	
	/**
     * Funzione che verifica che il nick utente sia valido. Il nick utente si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il nick utente e' corretto, false altrimenti
     */
	function validazioneNick() : bool
    {
        if ($this->nick && preg_match('/^[a-zA-Z0-9_-]{3,20}$/', $this->nick))
				return true;
		else
			return false;
    }
	
	function setCitta (string $citta)
    {
        $this->citta = $citta;  
    }
        
    function getCitta() : string
    {
        return $this->citta;
    }
	
	/**
     * Funzione che verifica che la città inserita sia valido. La città si intende valida se
     * contiene solamente lettere e spazi
     * @return bool true se la città e' corretta, false altrimenti
     */
	function validazioneCitta() : bool
    {
        if ($this->citta && preg_match('/^[a-zA-Z_-]{3,20}$/', $this->citta))
            return true;
        else
            return false;
    }
	
	function setCap(string $cap)
    {
        $this->cap = $cap;  
    }
        
    function getCap() : string
    {
        return $this->cap;
    }
	
	/**
     * Funzione che verifica che il CAP sia valido. Il CAP si intende valido se
     * contiene solamente numeri
     * @return bool true se il CAP utente e' corretto, false altrimenti
     */
    function validazioneCap() : bool
    {
        if ($this->cap && preg_match('/^[a-zA-Z0-9_-]{3,20}$/', $this->cap))
            return true;
        else
            return false;
    }
	
	function setVia (string $via)
    {
        $this->via = $via;  
    }
        
    function getVia() : string
    {
        return $this->via;
    }
	
	/**
     * Funzione che verifica che la via sia valida. La via si intende valida se
     * contiene solamente lettere e spazi
     * @return bool true se la via e' corretta, false altrimenti
     */
	function validazioneVia() : bool
    {
        if ($this->via && preg_match('/^[a-zA-Z_-]{3,20}$/', $this->via))
            return true;
        else
            return false;
    }
	
	/*function validazioneDtNasc() : bool
    {
        if ($this->dtNasc && preg_match('/^[0-9_-]{10,11}$/', $this->dtNasc))
            return true;
        else
            return false;
    }*/
	
	/**
     * Funzione che verifica che il luogo nascita sia valido. Il luogo nascita si intende valido se
     * contiene solamente lettere e spazi
     * @return bool true se il luogo nascita e' corretto, false altrimenti
     */
	function validazioneLgNasc() : bool
    {
        if ($this->lgNasc && preg_match('/^[a-zA-Z_-]{3,15}$/', $this->lgNasc))
            return true;
        else
            return false;
    }
    
	
	function getPrestito()
	{
		return f_persistance::getInstance()->carica(e_libro::class, $this->id, f_target::CARICA_PRESTITO);
	}
	
	function getPrenotazione()
	{
		return f_persistance::getInstance()->carica(e_libro::class, $this->id, f_target::CARICA_PRENOTAZIONE);
	}
	
	function getStorico()
	{
		return f_persistance::getInstance()->carica(e_libro::class, $this->id, f_target::CARICA_STORICO);
	}
	
	/**
     * Restituisce le info dell'utente
     * @return EUserInfo|NULL
     */
    function getUtenteInfo()
    {
        $uInfo = f_persistance::getInstance()->carica(e_utente::class, $this->id); 
        if($uInfo)
            $this->utenteInfo = $uInfo;
        else 
            $this->utenteInfo = new e_utente();
        return $this->utenteInfo;
    }
}
?>