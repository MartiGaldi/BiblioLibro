<?php 

require_once 'Installazione.php';
require_once 'SampleUsers.php';

require_once 'Entity/e_cliente.php';
require_once 'Entity/e_libro.php';
require_once 'Entity/e_prenotazione.php';
require_once 'Entity/e_copertina.php';
require_once 'Entity/e_prestito.php';
require_once 'Entity/e_utente.php';
require_once 'Entity/e_visitatore.php';
require_once 'Entity/e_bibliotecario.php';
require_once 'Entity/e_storico.php';


require_once 'Foundation/f_persistance.php';
require_once 'Foundation/f_prenotazione.php';
require_once 'Foundation/f_libro.php';
require_once 'Foundation/f_prestito.php';
require_once 'Foundation/f_copertina.php';
require_once 'Foundation/f_utente.php';
require_once 'Foundation/f_target.php';
require_once 'Foundation/f_storico.php';


require_once 'Controller/c_amministratore.php';
require_once 'Controller/c_ricerca.php';
require_once 'Controller/c_prenotazione.php';
require_once 'Controller/c_prestito.php';
require_once 'Controller/c_libro.php';
require_once 'Controller/c_sessione.php';
require_once 'Controller/c_utente.php';
require_once 'Controller/FrontController.php';


require_once 'View/v_amministratore.php';
require_once 'View/v_ricerca.php';
require_once 'View/v_prenotazione.php';
require_once 'View/v_prestito.php';
require_once 'View/v_oggetto.php';
require_once 'View/v_libro.php';
require_once 'View/v_utente.php';

require_once 'SmartyConfig.php';

?>