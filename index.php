<?php
require_once 'inc.php';


if(c_sessione::checkPopulateApplication())
{
    c_sessione::unsetCookie();
    header('Location: /BiblioLibro/indice');
}

elseif(file_exists('config.inc.php'))
{
    $controller = new FrontController();
    $controller->run();
}

elseif(Installazione::effettuaInstallazione()){
    c_sessione::populateApplication();
    header('Location: /BiblioLibro/indice'); // redirect verso l'applicazione  
}

?>