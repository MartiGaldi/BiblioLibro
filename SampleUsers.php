<?php
require_once 'inc.php';

class SampleUsers
{
    static function generateUserPool(int $nUtente, int $nBibliotecario)
    {
        $listaLibri = array();
        
        for ($i = 0; $i < $nBibliotecario; $i++)
        {
            SampleUsers::generaBibliotecario($i);
        }
        
        for ($i = 0; $i < $nUtente; $i++)
        {
            SampleUsers::generaCliente($i);
        }
    }
    
    
    
    private function generaCliente (int $n)
    {
        $cliente=new e_cliente();
        
        $cliente->setMail("cliente".$n."@mail.ex");
        $cliente->setPassword("cliente".$n);
        $cliente->hashPassword();
        
        f_persistance::getInstance()->salva($cliente);
        
        $staticInfo=new e_infoUtente();
        $staticInfo->setNome("cliente");
        $staticInfo->setCognome($n);
        $staticInfo->setDtNasc("0000-00-00");
        $staticInfo->setLuogoNascita("Luogo");
        $staticInfo->setCodFisc("Codice Fiscale");
        $staticInfo->setSesso("F o M");
        $staticInfo->setTelefono("0000000000");
        
        
        $cliente->setInfoUtente($staticInfo);
    }
    
    
    
    private function generaBibliotecario (int $n)
    {
        $bibl=new e_bibliotecario();
        
        $bibl->setMail("bibliotecario".$n."@mail.ex");
        $bibl->setPassword("bibliotecario".$n);
        $bibl->hashPassword();

        
        f_persistance::getInstance()->salva($bibl);
        

        $staticInfo=new e_infoUtente();
       
        $staticInfo->setNome("bibliotecario");
        $staticInfo->setCognome($n);
        $staticInfo->setDtNasc("0000-00-00");
        $staticInfo->setLuogoNascita("Luogo");
        $staticInfo->setCodFisc("Codice Fiscale");
        $staticInfo->setSesso("F o M");
        $staticInfo->setTelefono("0000000000000");
        
        
        $bibl->setInfoUtente($staticInfo);
        
        
        $staticLibro = new e_libro();
        
        $staticLibro->setAutore("Autore".$n);
        $staticLibro->setTitolo("Libro".$n);
        $staticLibro->setNumCopie("Copie".$n);
        
        f_persistance::getInstance()->salva($staticLibro);
        
        return $bibl;   
    }
}