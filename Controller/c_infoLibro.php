<?php
require_once 'inc.php';

/**
 * La classe c_infoLibro implementa la funzionalità 'Gestione Catalogo': le sue funzioni infatti
 * presentano/ricevono una form in cui il bibliotecario inserirà informazioni sui testi, come :
 * - Isbn
 * - Descrizione
 * - Categoria
 * - Copertina
 * @package Controller
 */

class c_infoLibro
{
    /**
     * A seconda del tipo di metodo richiesto dal bibliotecario, verranno attivate funzioni diverse.
     * In particolare:
     * - registra() salva su DB le informazioni inserite dal bibliotecario.
     * - mostraFormInfoLibro() mostra al bibliotecario la form in cui inserire i dati.
     */
    
    static function modificaInfo()
    {
        $Utente = c_sessione::getUtenteDaSessione();
        
        if(get_class($Utente) == e_bibliotecario::class)
        {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            c_infoLibro::registra();
        
        elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
            c_infoLibro::mostraFormInfoLibro();
        }
    }
    
    
    
    /**
     * La funzione Registra permette di creare un nuovo oggetto info libro e salvarlo sul DB.
     */
    
    private function registra()
    {
        $v_infoLibro = new v_infoLibro();
        $Utente = c_sessione::getUtenteDaSessione();
        
        if(get_class($Utente) == e_bibliotecario::class)
        {
            $InfoLibro= $v_infoLibro->creaInfoLibro();
            $Libro->setInfoLibro($InfoLibro);
            
            header('Location: /BiblioLibro/catalogo/nuovo/'.$Libro->getId());
        }
        else
            $v_infoLibro->Errore ($libro, 'Non puoi registrare nuovi elemnti. Questa funzione è riservata ad un bibliotecario');
    }
    
    
    
    /**
     * Mostra al bibliotecario la form per la modifica delle informazioni. Se l'utente non è un bibliotecario,
     * verrà reindirizzato ad un messaggio di errore.
     */
    
    private function mostraFormLibro()
    {
        $v_infoLibro = new v_infoLibro();
        $Utente = c_sessione::getUtenteDaSessione();
        
        if(get_class($Utente) == e_biblioecario ::class)
        {
            $v_infoLibro->mostraFormInfoLibro ($Utente);
        }
        
        else
            $v_infoLibro->Error($Utente, 'Devi essere un bibliotecario per modificare le informazioni');
    }
}
?>