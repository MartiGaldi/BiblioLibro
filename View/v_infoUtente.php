<?php

require_once 'inc.php';
include_once 'View/v_oggetto.php';

class v_infoUtente extends v_oggetto
{
    function __construct()
    {
        parent::__construct();
           
        $this->check = array(
            'nome' => true,
            'cognome' => true,
            'cod_fisc' => true,
            'telefono' => true,
            'sesso' => true,
            'dt_nasc' => true,
            'luogo_nascita' => true
        );
    }
    
    /**
    * Funzione che permette la creazione delle info utente con i valori prelevati da una form
    * @return e_infoUtente ottenuta dai campi della form
    */
    
    function creaInfoUtente() : e_infoUtente
    {
        $infoUtente = new e_infoUtente();
        
        if(isset($_POST['nome']))
            $infoUtente->setNome($_POST['nome']);
            
        if(isset($_POST['cognome']))
            $InfoUtente->setCognome($_POST['cognome']);
                
        if(isset($_POST['cof_fisc']))     
            $infoUtente->setCodFisc($_POST['cod_fisc']);
                    
        if(isset($_POST['telefono']))                
            $infoUtente->setTelefono($_POST['telefono']);
                        
        if(isset($_POST['sesso']))                   
            $infoUtente->setSesso($_POST['sesso']);
                            
        if(isset($_POST['dt_nasc']))
            $infoUtente->setDtNasc($_POST['dt_nasc']);
                            
        if(isset($_POST['dt_nasc']))
            $infoUtente->setLuogoNascita($_POST['dt_nasc']);
                                
        return $infoUtente;   
    }
    
    /**
    * Controlla se l'oggetto e_infoUtente sia valido
    * @param e_infoUtente $e_info di norma e' un oggetto ottenuto dal metodo creaInfoUtente()
    * @return true se l'oggetto e' valido, false altrimenti
    */
    
    function validazioneInfoUtente(e_infoUtente &$e_info) : bool
    {
        $e_info->validate($this->check['nome'], $this->check['cognome'], $this->check['cod_fisc'], $this->check['telefono'], $this->check['sesso'], $this->check['dt_nasc'], $this->check['luogo_nascita']);
        
        if($this->check['nome'] && $this->check['cognone'] && $this->check['cod_fisc'] && $this->check['telefono'] && $this->check['sesso'] && $this->check['dt_nasc'] && $this->check['luogo_nascita'])
            return true;
        else
            return false;    
    }
    
    /**
    * Mostra la form di modifica delle info utente
    * @param bool $error (facoltativo se presente un errore)
    */
    
    function mostraFormInfoUtente(e_utente &$utente, bool $errore = NULL)
    {
        if (! $errore)
            
            $errore = false;
            
            $infoUtente = $utente->getInfoUtente();

            
            $this->smarty->registerObject('utente', $utente);
            
            $this->smarty->assign('info', $infoUtente);
            
            
            $this->smarty->assign('uTipo', lcfirst(substr(get_class($utente), 1)));
            
            
            $this->smarty->assign('errore', $errore);
            
            $this->smarty->assign('check', $this->check);
            
            
            $this->smarty->display('user/registrazioneInfoUtente.tpl');       
    }    
}

?>