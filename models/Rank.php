<?php

class Rank {

    private $id_rank;
    private $nom_rank;


    /**
     * Get the value of id_rank
     */ 
    public function getId_rank()
    {
        return $this->id_rank;
    }

    /**
     * Set the value of id_rank
     *
     * @return  self
     */ 
    public function setId_rank($id_rank)
    {
        $this->id_rank = $id_rank;

        return $this;
    }



    /**
     * Get the value of nom_rank
     */ 
    public function getNom_rank()
    {
        return $this->nom_rank;
    }

    /**
     * Set the value of nom_rank
     *
     * @return  self
     */ 
    public function setNom_rank($nom_rank)
    {
        $this->nom_rank = $nom_rank;

        return $this;
    }
}