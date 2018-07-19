<?php 

require_once 'Installazione.php';
require_once 'SampleUsers.php';

require_once 'Entity/e_cliente.php';
require_once 'Entity/e_libro.php';
require_once 'Entity/e_prenota.php';
require_once 'Entity/e_infoUtente.php';
require_once 'Entity/e_infoLibro.php';
require_once 'Entity/e_copertina.php';
require_once 'Entity/e_prestito.php';
require_once 'Entity/e_oggetto.php';
require_once 'Entity/e_utente.php';
require_once 'Entity/e_visitatore.php';
require_once 'Entity/e_bibliotecario.php';
require_once 'Entity/e_storicoPrestito.php';


require_once 'Foundation/f_persistance.php';
require_once 'Foundation/f_prenota.php';
require_once 'Foundation/f_libro.php';
require_once 'Foundation/f_prestito.php';
require_once 'Foundation/f_infoUtente.php';
require_once 'Foundation/f_infoLibro.php';
require_once 'Foundation/f_copertina.php';
require_once 'Foundation/f_utente.php';
require_once 'Foundation/f_target.php';
require_once 'Foundation/f_storicoPrestito.php';


require_once 'Controller/c_amministratore.php';
require_once 'Controller/c_cerca.php';
require_once 'Controller/c_infoLibro.php';
require_once 'Controller/c_libro.php';
require_once 'Controller/c_sessione.php';
require_once 'Controller/c_utente.php';
require_once 'Controller/c_infoUtente.php';
require_once 'Controller/FrontController.php';


require_once 'View/v_amministratore.php';
require_once 'View/v_cerca.php';
require_once 'View/v_infoUtente.php';
require_once 'View/v_oggetto.php';
require_once 'View/v_libro.php';
require_once 'View/v_utente.php';
require_once 'View/v_infoLibro.php';

require_once 'SmartyConfig.php';

?>