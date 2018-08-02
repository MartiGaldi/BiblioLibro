<?php
require_once 'inc.php';


if(c_sessione::checkPopulateApplication())
{
    c_sessione::unsetCookie();
    header('Location: /BiblioLibro/index');
	SampleUsers::generateUserPool(3, 3, 3);
}

elseif(file_exists('config.inc.php'))
{
    $controller = new FrontController();
    $controller->run();
}

elseif(Installazione::effettuaInstallazione()){
    c_sessione::populateApplication();
    header('Location: /BiblioLibro/index'); // redirect verso l'applicazione  
}

?>