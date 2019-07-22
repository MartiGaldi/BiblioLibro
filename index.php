<?php
require_once 'inc.php';

if(file_exists('config.inc.php'))
{
    $controller = new FrontController();
    $controller->run();
}

elseif(Installazione::effettuaInstallazione()){
    header('Location: /BiblioLibro/index'); // redirect verso l'applicazione  
}

?>