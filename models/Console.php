<?php

class Console{

private $id;
private $image;
private $marque;
private $type;
private $modele;
private $prix;
private $quantite;
private $capacite;
private $nbrarticle;

public function __construct()
    {
        $this->marque = new Marque;
        $this->type = new Type;
    }


/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of marque
 */ 
public function getMarque()
{
return $this->marque;
}

/**
 * Set the value of marque
 *
 * @return  self
 */ 
public function setMarque($marque)
{
$this->marque = $marque;

return $this;
}

/**
 * Get the value of type
 */ 
public function getType()
{
return $this->type;
}

/**
 * Set the value of type
 *
 * @return  self
 */ 
public function setType($type)
{
$this->type = $type;

return $this;
}

/**
 * Get the value of prix
 */ 
public function getPrix()
{
return $this->prix;
}

/**
 * Set the value of prix
 *
 * @return  self
 */ 
public function setPrix($prix)
{
$this->prix = $prix;

return $this;
}

/**
 * Get the value of quantite
 */ 
public function getQuantite()
{
return $this->quantite;
}

/**
 * Set the value of quantite
 *
 * @return  self
 */ 
public function setQuantite($quantite)
{
$this->quantite = $quantite;

return $this;
}

/**
 * Get the value of capacite
 */ 
public function getCapacite()
{
return $this->capacite;
}

/**
 * Set the value of capacite
 *
 * @return  self
 */ 
public function setCapacite($capacite)
{
$this->capacite = $capacite;

return $this;
}

/**
 * Get the value of modele
 */ 
public function getModele()
{
return $this->modele;
}

/**
 * Set the value of modele
 *
 * @return  self
 */ 
public function setModele($modele)
{
$this->modele = $modele;

return $this;
}

/**
 * Get the value of image
 */ 
public function getImage()
{
return $this->image;
}

/**
 * Set the value of image
 *
 * @return  self
 */ 
public function setImage($image)
{
$this->image = $image;

return $this;
}

/**
 * Get the value of nbrarticle
 */ 
public function getNbrarticle()
{
return $this->nbrarticle;
}

/**
 * Set the value of nbrarticle
 *
 * @return  self
 */ 
public function setNbrarticle($nbrarticle)
{
$this->nbrarticle = $nbrarticle;

return $this;
}
}