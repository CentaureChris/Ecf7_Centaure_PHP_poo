<?php

class AdminMarqueModel extends Driver{

    public function getMarques()
    {
        $sql = "SELECT * FROM marque";
        $result = $this->getRequest($sql);

        $marques = $result->fetchAll(PDO::FETCH_OBJ);

        $datas = [];

        foreach($marques as $marque){

            $c = new Marque();
            $c->setId_marque($marque->id_marque);
            $c->setNom_marque($marque->nom_marque);

            array_push($datas,$c);

        }
        return $datas;
    
    }

}