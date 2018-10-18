<?php 

require_once 'inc.php';
include_once 'Entity/e_oggetto.php';

/**
* La classe e_utente contiene tutti gli attributi e metodi base che sono adoperati da tutte
* le tipologie di utente (cliente, bibliotecario,visitatore).
* Contiene metodi per impostare, ottenere, validare i seguenti attributi:
* - mail: l'indirizzo utilizzato in fase di registrazione
* - password: la password per accedere nell'applicazione
* - info: oggetto e_InfoUtente contenente informazioni da modificare e visualizzabili nel profilo
* @author gruppo11
* @package Entity
*/

class e_utente extends e_oggetto
{
	//protected $id;
    protected $nick_name;
    protected $mail;
    protected $password;
	protected $nome;
	protected $cognome;
	protected $dtNasc;
	protected $lgNasc;
    
    function __construct()
	{
		parent::__construct();
	}
	
	
    /*function getId() : int
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
	*/

    function setNick(string $nick_name)
    {
        $this->nick_name = $nick_name;  
    }
        
    function getNick() : string
    {
        return $this->nick_name;
    }
        
	 
        
    function validazioneNick() : bool
    {
        if ($this->nick_name && preg_match('/^[a-zA-Z0-9_-]{6,15}$/', $this->nick_name))
            return true;
        else
            return false;
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
    
    
    /** Metodo che verifica che la struttura dell'e-mail sia valida
     * @return bool true se l'email e' corretta, false altrimenti
     */
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
            return true;
        
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
    function verificaPassword () : bool
    {
        return password_verify($this->password, f_persistance::getIstance()->carica(e_cliente::class, $this->id)->getPassword());
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
     
     function validazioneNome() : bool
    {
        if ($this->nome && preg_match('/^[a-zA-Z_-]{3,20}$/', $this->nome))
            return true;
        else
            return false;
    }
	
	function validazioneCognome() : bool
    {
        if ($this->cognome && preg_match('/^[a-zA-Z_-]{3,20}$/', $this->cognome))
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
	
	 function validazioneLgNasc() : bool
    {
        if ($this->lgNasc && preg_match('/^[a-zA-Z_-]{6,15}$/', $this->lgNasc))
            return true;
        else
            return false;
    }
    
    /*function __toString()
    {
        return "Nickname: ".$this->nick_name."\nId: ".$this->id;
    }*/
	
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
}
?>