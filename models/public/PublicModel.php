<?php

class PublicModel extends Driver{

    public function findConsoleByMarque(Console $console){

        $sql = "SELECT * FROM console c
        INNER JOIN marque m
        INNER JOIN type t 
        ON c.marque = m.id_marque AND c.type = t.id_type
        WHERE c.marque = :id ";

        $result = $this->getRequest($sql,["id"=>$console->getMarque()->getId_marque()]);
        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $console=[];

        foreach ($rows as $row ) {
            $newConsole = new console;
            $newConsole->setId($row->id_console);
            $newConsole->getMarque()->getId_marque($row->id_marque);
            $newConsole->getMarque()->getNom_marque($row->nom_marque);

            $newConsole->setModele($row->modele);
            $newConsole->setPrix($row->prix);
            $newConsole->setCapacite($row->capacité);
            $newConsole->setQuantite($row->quantite);
            $newConsole->setImage($row->image);

            $newConsole->getType()->setId_type($row->id_type);
            $newConsole->getType()->setNom_type($row->nom_type);

           
            array_push($console,$newConsole);
        }
        
        return $console;
    }
    public function updateStock(Console $v)  
    {
        $sql = "UPDATE console SET quantite = :quantite WHERE id_console = :id";
        $result = $this->getRequest($sql,["quantite"=>$v->getQuantite(),"id"=>$v->getId()]);
    }
}

