<?php

class Marque{

    private $id_marque;
    private $nom_marque;



    /**
     * Get the value of id_marque
     */ 
    public function getId_marque()
    {
        return $this->id_marque;
    }

    /**
     * Set the value of id_marque
     *
     * @return  self
     */ 
    public function setId_marque($id_marque)
    {
        $this->id_marque = $id_marque;

        return $this;
    }

    /**
     * Get the value of nom_marque
     */ 
    public function getNom_marque()
    {
        return $this->nom_marque;
    }

    /**
     * Set the value of nom_marque
     *
     * @return  self
     */ 
    public function setNom_marque($nom_marque)
    {
        $this->nom_marque = $nom_marque;

        return $this;
    }
}
