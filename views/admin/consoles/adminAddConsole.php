<?php ob_start();
require_once('./views/templateAdmin.php');


?>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h1 class="display-6 text-center font-monospace text-decoration-underline">Ajout d'une Console</h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="form-select">
                            <option value="">Choisir</option>
                            <?php foreach ($tabType as $type) {; ?>
                                <option value="<?= $type->getId_type(); ?>"><?= strtoupper($type->getNom_type()); ?></option>
                            <?php }; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="modele">Modèle</label>
                        <input type="text" id="modele" name="modele" class="form-control" placeholder="Le modèle">
                    </div>
                    <div class="col">
                        <label for="marque">Marque</label>
                        <select id="marque" name="marque" class="form-select">
                            <option value="">Choisir</option>
                            <?php foreach ($tabMarque as $marque) {; ?>
                                <option value="<?= $marque->getId_marque(); ?>"><?= strtoupper($marque->getNom_Marque()); ?></option>
                            <?php }; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="prix">Prix</label>
                        <input type="text" id="prix" name="prix" class="form-control" placeholder="Le prix">
                    </div>
                    <div class="col">
                        <label for="quantite">Quantité</label>
                        <input type="number" id="quantite" name="quantite" class="form-control" placeholder="La quantité">
                    </div>
                    <div class="col">
                        <label for="capacite">Capacité</label>
                        <input type="number" id="capacite" name="capacite" class="form-control" placeholder=" .... giga octet">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary  col-12 mt-2" name="submit">Insérer</button>
            </form>
        </div>
    </div>
</div>
<?php
// $contenu = ob_get_clean();
?>