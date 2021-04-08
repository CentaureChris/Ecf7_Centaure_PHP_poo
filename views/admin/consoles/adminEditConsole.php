<?php ob_start();
require_once('./views/templateAdmin.php');

// var_dump($editConsole);
?>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h1 class="display-6 text-center font-monospace text-decoration-underline">Modification de l'article: Console n°00<?= $editConsole->getId() ?></h1>
            <img src="./assets/images/<?= $editConsole->getImage() ?>" alt="..." width="200px" heigth="300px">
           
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
               
                <div class="row">
                    <div class="col">
                        <label for="type">Type</label>
                        <select id="cat" name="type" class="form-select">
                            <option value="<?= $editConsole->getType()->getId_type() ?>">

                            <?php foreach ($tabType as $type){
                                if($type->getId_type() == $editConsole->gettype()->getId_type()){
                                  echo strtoupper($type->getNom_type());
                                }
                            }
                           ?></option>
                            
                            <?php foreach ($tabType as $type) {if($type->getId_type() != $editConsole->getType()->getId_type()){; ?>
                                <option value="<?= $type->getId_type(); ?>"><?= strtoupper($type->getNom_type()); ?></option>
                            <?php }}; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="modele">Modèle</label>
                        <input type="text" id="modele" name="modele" class="form-control" placeholder="Le modèle" value="<?= $editConsole->getModele() ?>">
                    </div>
                    <div class="col">
                        <label for="marque">Marque</label>
                        <select id="marque" name="marque" class="form-select">
                            <option value="<?= $editConsole->getMarque()->getId_marque() ?>">

                            <?php foreach ($tabMarque as $marque){
                                if($marque->getId_marque() == $editConsole->getmarque()->getId_marque()){
                                  echo strtoupper($marque->getNom_marque());
                                }
                            }
                           ?></option>
                            
                            <?php foreach ($tabMarque as $marque) {if($marque->getId_marque() != $editConsole->getMarque()->getId_marque()){; ?>
                                <option value="<?= $marque->getId_marque(); ?>"><?= strtoupper($marque->getNom_marque()); ?></option>
                            <?php }}; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="prix">Prix</label>
                        <input type="text" id="prix" name="prix" class="form-control" placeholder="Le prix" value="<?= $editConsole->getPrix() ?>">
                    </div>
                    <div class="col">
                        <label for="quantite">Quantité</label>
                        <input type="number" id="quantite" name="quantite" class="form-control" placeholder="La quantité" value="<?= $editConsole->getQuantite() ?>">
                    </div>
                    <div class="col">
                        <label for="capacite">Capacité</label>
                        <input type="number" id="capacite" name="capacite" class="form-control" placeholder=" .... giga octet" value="<?= $editConsole->getCapacite() ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary  col-12 mt-2" name="submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<?php
// $contenu = ob_get_clean();
?>