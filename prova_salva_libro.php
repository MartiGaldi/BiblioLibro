<?php 

require 'inc.php';

$p= f_persistance::getInstance();

$libro=new e_libro();

$libro->setIsbn(1234567891234);
$libro->setNumCopie(4);
$libro->setTitolo('CIAO');
$libro->setAutore('MARTINA');

if($p->salva($libro))
    echo 'Caricamento ok';
else 
    echo 'Caricamento fallito';
$p->closeDBConnection();


?>