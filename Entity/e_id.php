<?php 

require_once'inc.php';
class e_id {
    protected $id;
    function getId():int{
        return $this->id;
    }
    function setId(int $id){
        $this->id=$id; 
    }
}
?>