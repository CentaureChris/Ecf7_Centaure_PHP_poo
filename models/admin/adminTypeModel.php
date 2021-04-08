<?php

class AdminTypeModel extends Driver {
    
    public function getType()
    {
        $sql = "SELECT * FROM type";
        $result = $this->getRequest($sql);

        $types = $result->fetchAll(PDO::FETCH_OBJ);

        $datas = [];

        foreach($types as $type){

            $t = new Type();
            $t->setId_type($type->id_type);
            $t->setNom_type($type->nom_type);

            array_push($datas,$t);
        }
        return $datas;
    }
}