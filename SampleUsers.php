<?php
require_once 'inc.php';

class SampleUsers
{
    static function generateUserPool(int $nUtenti, int $nBibliotecari)
    {
        $listaLibri = array();
        
        for ($i = 0; $i < $nBibliotecari; $i++)
        {
            SampleUsers::generaBibliotecario($i);
        }
        
        for ($i = 0; $i < $nUtenti; $i++)
        {
            SampleUsers::generaCliente($i);
        }
    }
    
    
    
    private function generaCliente (int $n)
    {
        $cli=new e_cliente();
		
		$cli->seiId(0);
        $cli->setNick("cliente".$n);
        $cli->setMail("cliente".$n."@mail.ex");
        $cli->setPassword("cliente".$n);
        $cli->hashPassword();
        
        f_persistance::getInstance()->salva($cli);
        
        $staticInfo=new e_infoUtente();
		
        $staticInfo->setNome("cliente");
        $staticInfo->setCognome($n);
        $staticInfo->setDtNasc("0000-00-00");
        $staticInfo->setLuogoNascita("Luogo");
        $staticInfo->setCodFisc("0000000000000000");
        $staticInfo->setSesso("F");
        $staticInfo->setTelefono("0000000000");
        
        $cli->setInfoUtente($staticInfo);
    }
    
    
    
    private function generaBibliotecario (int $n)
    {
        $bibl=new e_bibliotecario();
        
		$bibl->seiId(0);
		$bubl->setNick("bibliotecario".$n);
        $bibl->setMail("bibliotecario".$n."@mail.ex");
        $bibl->setPassword("bibliotecario".$n);
        $bibl->hashPassword();
		
        f_persistance::getInstance()->salva($bibl);
        
        $staticInfo=new e_infoUtente();
        $staticInfo->setNome("bibliotecario");
        $staticInfo->setCognome($n);
        $staticInfo->setDtNasc("0000-00-00");
        $staticInfo->setLuogoNascita("Luogo");
        $staticInfo->setCodFisc("0000000000000000");
        $staticInfo->setSesso("F");
        $staticInfo->setTelefono(0000000000000);
        
        $bibl->setInfoUtente($staticInfo);
        
        /*$staticLibro = new e_libro();
		$staticLibro->setId(0);
        $staticLibro->setAutore("Autore".$n);
        $staticLibro->setTitolo("Libro".$n);
        $staticLibro->setNumCopie(0.$n);
		$staticLibro->setDurata("Consultazione".$n);
        $staticLibro->setGenere("Genere".$n);
		//private $info_libro;
        $bibl->setInfoLibro($staticLibro);
		
        f_persistance::getInstance()->salva($staticLibro);
        
        return $bibl; */   
		
    }
}