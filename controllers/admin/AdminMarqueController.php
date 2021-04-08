<?php

class AdminMarqueController
{

    private $admm;

    public function __construct()
    {
        $this->admm = new AdminMarqueModel();
       
    }

    public function listMarque()
    {
        $marques = $this->admm->getMarques();
        // var_dump($consoles);
        require_once('./views/admin/marques/adminMarqueItem.php');
    }

}