<?php

class Type{

    private $id_type;
    private $nom_type;



    /**
     * Get the value of id_type
     */ 
    public function getId_type()
    {
        return $this->id_type;
    }

    /**
     * Set the value of id_type
     *
     * @return  self
     */ 
    public function setId_type($id_type)
    {
        $this->id_type = $id_type;

        return $this;
    }

    /**
     * Get the value of nom_type
     */ 
    public function getNom_type()
    {
        return $this->nom_type;
    }

    /**
     * Set the value of nom_type
     *
     * @return  self
     */ 
    public function setNom_type($nom_type)
    {
        $this->nom_type = $nom_type;

        return $this;
    }
}