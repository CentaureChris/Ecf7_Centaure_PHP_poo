<?php

class AdminConsoleController
{

    private $adcm;
    private $admm;
    private $adtm;


    public function __construct()
    {
        $this->adcm = new AdminConsoleModel();
        $this->admm = new AdminMarqueModel();
        $this->adtm = new AdminTypeModel();
       
    }

    public function listConsole()
    {
        $consoles = $this->adcm->getConsole();
        // var_dump($consoles);
        require_once('./views/admin/consoles/adminConsoleItem.php');
    }

    public function deleteConsole()
    {
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            $id = $_GET['id'];
            $delConsole = new Console();
            $delConsole->setId($id);
            $nb = $this->adcm->removeConsole($delConsole);

            if($nb > 0){
                header('location: index.php?action=list_console');
            }
        }
    }

    public function addConsole()
    {
        
        $tabMarque = $this->admm->getMarques();
        $tabType = $this->adtm->getType();

        if(isset($_POST['submit'])){

            $console = new Console();

            $marque = trim(addslashes(htmlentities($_POST['marque'])));
            $console->getMarque()->setId_marque($marque);

            $modele = trim(addslashes(htmlentities($_POST['modele'])));
            $console->setModele($modele);

            $type = trim(addslashes(htmlentities($_POST['type'])));
            $console->getType()->setId_type($type);

            $quantite = trim(addslashes(htmlentities($_POST['quantite'])));
            $console->setQuantite($quantite);

            $capacite = trim(addslashes(htmlentities($_POST['capacite'])));
            $console->setCapacite($capacite);

            $prix = trim(addslashes(htmlentities($_POST['prix'])));
            $console->setPrix($prix);

            $image = $_FILES['image']['name'];
            $console->setImage($image);

            $destination = "./assets/images/";
            move_uploaded_file($_FILES['image']['tmp_name'], $destination . $image);

            $nb = $this->adcm->insertConsole($console,$image);

            if($nb) {
                header('location:index.php?action=list_console');
            }
        }
        require_once('./views/admin/consoles/adminAddConsole.php');
    }

    public function editConsole()
    {
        if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
            $id = $_GET['id'];
            $editConsole = new Console();
            $editConsole->setId($id);
            $editConsole = $this->adcm->itemConsole($editConsole);
    
            $tabMarque = $this->admm->getMarques();
            $tabType = $this->adtm->getType();
            
            
                if(isset($_POST['submit'])){

                    $marque = trim(addslashes(htmlentities($_POST['marque'])));
                    $editConsole->getMarque()->setId_marque($marque);
        
                    $modele = trim(addslashes(htmlentities($_POST['modele'])));
                    $editConsole->setModele($modele);
        
                    $type = trim(addslashes(htmlentities($_POST['type'])));
                    $editConsole->getType()->setId_type($type);
        
                    $quantite = trim(addslashes(htmlentities($_POST['quantite'])));
                    $editConsole->setQuantite($quantite);
        
                    $capacite = trim(addslashes(htmlentities($_POST['capacite'])));
                    $editConsole->setCapacite($capacite);
        
                    $prix = trim(addslashes(htmlentities($_POST['prix'])));
                    $editConsole->setPrix($prix);
        
                    $image = $_FILES['image']['name'];
                    $editConsole->setImage($image);
        
                    $destination = "./assets/images/";
                    move_uploaded_file($_FILES['image']['tmp_name'], $destination . $image);
        
                    $nb = $this->adcm->updateConsole($editConsole,$image);
    
                if($nb>0) {
                    header('location:index.php?action=list_console');
                }
            }
         require_once('./views/admin/consoles/adminEditConsole.php');
        }
    }
}