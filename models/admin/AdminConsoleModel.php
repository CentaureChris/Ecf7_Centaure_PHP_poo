<?php

class AdminConsoleModel extends Driver{

    public function getConsole($search=null)
    {
        if(!empty($search)){

            $sql = "SELECT * FROM console c 
            INNER JOIN marque m 
            INNER JOIN type t 
            ON c.marque = m.id_marque AND c.type = t.id_type
            WHERE nom_marque LIKE :marque OR modele LIKE :modele OR nom_type LIKE :type  OR capacité LIKE :capacite";

            $searchParam = ["marque"=>"$search%", "modele"=>"$search%", "type"=>"$search%", "capacite"=>"$search%"];
            $result = $this->getRequest($sql,$searchParam);

        }else{
            $sql = "SELECT * FROM console c 
            INNER JOIN marque m 
            INNER JOIN type t 
            WHERE c.marque = m.id_marque AND c.type = t.id_type ";

            $result = $this->getRequest($sql);
            }
        

        $consoles = $result->fetchAll(PDO::FETCH_OBJ);
        $datas = [];

        foreach($consoles as $console){

            $c = new Console();

            $c->setId($console->id_console);
            $c->setImage($console->image);

            $c->getMarque()->setId_marque($console->marque);
            $c->getMarque()->setNom_marque($console->nom_marque);

            $c->getType()->setId_type($console->type);
            $c->getType()->setNom_type($console->nom_type);
            
            $c->setModele($console->modele);
            $c->setQuantite($console->quantite);
            $c->setPrix($console->prix);
            $c->setCapacite($console->capacité);

            array_push($datas,$c);

        }
        if($result->rowCount() == 0){
            return "No match Found...!!";
               
    
            }else{
            return $datas;
        }
    }

    public function removeConsole(Console $cParam) 
    {
        $sql = "DELETE FROM console WHERE id_console = :id";
        $result = $this->getRequest($sql,["id"=>$cParam->getId()]);
        return $result->rowCount();

    }

    public function insertConsole(Console $console,$image = null)
    {
        $sql= "INSERT INTO console (image, marque, type , modele, quantite, prix, capacité)
                VALUES (:image, :marque, :type, :modele, :quantite, :prix, :capacite) ";
        
        $tabPara = ["image"=>$console->getImage(),"marque"=>$console->getMarque()->getId_marque(),"type"=>$console->getType()->getId_type(),"modele"=>$console->getModele(),"quantite"=>$console->getQuantite(),"prix"=>$console->getPrix(),"capacite"=>$console->getCapacite()];
        $result = $this->getRequest($sql,$tabPara);

        return $result;
    }

    public function itemConsole(Console $cParam){
        $sql = "SELECT * FROM console c 
        INNER JOIN marque m 
        INNER JOIN type t 
        WHERE id_console = :id";
        $result = $this->getRequest($sql,['id'=>$cParam->getId()]);
       

        if($result->rowCount()>0){
        $consoleRow = $result->fetch(PDO::FETCH_OBJ);
        $editconsole = new Console();
        $editconsole->setId($consoleRow->id_console);

        $editconsole->getMarque()->setId_marque($consoleRow->marque);
        $editconsole->getMarque()->setNom_marque($consoleRow->nom_marque);


        $editconsole->getType()->setId_type($consoleRow->type);
        $editconsole->getType()->setNom_type($consoleRow->nom_type);
        
        $editconsole->setModele($consoleRow->modele);
        $editconsole->setPrix($consoleRow->prix);
        $editconsole->setQuantite($consoleRow->quantite);
        $editconsole->setImage($consoleRow->image);
        $editconsole->setCapacite($consoleRow->capacité);

        return $editconsole;
        }
    }
    
    public function updateConsole(Console $updateC){
        if($updateC->getImage() === ""){

            $sql = "UPDATE console
            SET marque = :marque, modele = :modele, prix = :prix, capacité = :capacite, quantite = :quantite, type = :type
            WHERE id_console =:id ";
        
            $tabParams = ["marque"=>$updateC->getMarque()->getId_marque(),"modele"=>$updateC->getModele(), "prix"=>$updateC->getPrix(), "capacite"=>$updateC->getCapacite(), "quantite"=>$updateC->getQuantite(), "type"=>$updateC->getType()->getId_type(), "id"=>$updateC->getId()];

        }else{

            $sql = "UPDATE console
                    SET marque = :marque, modele = :modele, prix = :prix, capacité = :capacite, quantite = :quantite, type = :type, image = :image
                    WHERE id_console = :id ";
                
            $tabParams = ["marque"=>$updateC->getMarque()->getId_marque(),"modele"=>$updateC->getModele(), "prix"=>$updateC->getPrix(), "capacite"=>$updateC->getCapacite(), "quantite"=>$updateC->getQuantite(), "image"=>$updateC->getImage(), "type"=>$updateC->getType()->getId_type(), "id"=>$updateC->getId()];

        }
        $result = $this->getRequest($sql,$tabParams);

        return $result->rowCount();
        }
}

