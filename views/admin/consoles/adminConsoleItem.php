<?php 
ob_start();
// var_dump($_SESSION['Auth']);
require_once('./views/templateAdmin.php');

?>

<h1 class ="text-center">Liste Console</h1>

<div class="container">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group m-2 mt-5">
    <input class="form-control text-center " type="search" name="search" id="search" placeholder="Rechecher...">
    <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
</form>
<?php if(is_array($consoles)){ ?>
    <table class="table table-striped text-center align-middle">
        <thead>
            <th>Id</th>
            <th>Image</th>
            <th>Marque</th>
            <th>Type</th>
            <th>Modele</th>
            <th>Capacité</th>
            <th>Prix</th>
            <th>Stock</th>
            
            <?php if(isset($_SESSION['Auth']) && $_SESSION['Auth']->rank <= 2){ ?>
            <th>Action</th>
            <?php } ?>

        </thead>
        <tbody>
            <?php foreach($consoles as $console) { ?>
            <tr>
                <td><?= $console->getId()?></td>
                <td><img src="./assets/images/<?= $console->getImage(); ?>" alt="" width="100px" /></td>
                <td><?= ucfirst($console->getMarque()->getNom_marque()) ?></td>
                <td><?= $console->getType()->getNom_type() ?></td>
                <td><?= ucfirst($console->getModele())?></td>
                <td><?= $console->getCapacite()?></td>
                <td><?= $console->getPrix()?> €</td>
                <td><?= $console->getQuantite()?></td>
                <?php if(isset($_SESSION['Auth']) && $_SESSION['Auth']->rank <= 2){ ?>
                    <td>
                        <a href="index.php?action=edit_console&id=<?= $console->getId() ?>"><i class="fas fa-pen btn btn-success"></i></a> 
                        <a href="index.php?action=delete_console&id=<?= $console->getId() ?>" onclick="return confirm('Valider la supression??')"><i class="fas fa-trash btn btn-danger"></i></a>
                    </td>
                <?php } ?>
            </tr>
            <?php } } else{?>
                <h2 class="text-center">No match found </h2>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
// $contenu = ob_get_clean();

?>

