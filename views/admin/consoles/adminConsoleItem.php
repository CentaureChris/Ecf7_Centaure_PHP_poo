<?php 
ob_start();
// var_dump($consoles);
require_once('./views/templateAdmin.php');

?>

<h1 class ="text-center">Liste Console</h1>

<div class="container">
    <table class="table table-striped text-center align-middle">
        <thead>
            <th>Id</th>
            <th>Image</th>
            <th>Marque</th>
            <th>Type</th>
            <th>Modele</th>
            <th>Capacité</th>
            <th>Prix</th>
            <th>Quantité</th>
            
            <?php if(isset($_SESSION['Auth']) && $_SESSION['Auth']->rank == 1){ ?>
            <th>Action</th>
            <?php } ?>

        </thead>
        <tbody>
            <?php if(is_array($consoles)){foreach($consoles as $console) { ?>
            <tr>
                <td><?= $console->getId()?></td>
                <td><img src="./assets/images/<?= $console->getImage(); ?>" alt="" width="100px" /></td>
                <td><?= ucfirst($console->getMarque()->getNom_marque()) ?></td>
                <td><?= $console->getType()->getNom_type() ?></td>
                <td><?= ucfirst($console->getModele())?></td>
                <td><?= $console->getCapacite()?></td>
                <td><?= $console->getPrix()?> €</td>
                <td><?= $console->getQuantite()?></td>
                <?php if(isset($_SESSION['Auth']) && $_SESSION['Auth']->rank == 1){ ?>
                    <td>
                        <a href="index.php?action=edit_console&id=<?= $console->getId() ?>"><i class="fas fa-pen btn btn-success"></i></a> 
                        <a href="index.php?action=delete_console&id=<?= $console->getId() ?>" onclick="return confirm('Valider la supression??')"><i class="fas fa-trash btn btn-danger"></i></a>
                    </td>
                <?php } ?>
            </tr>
            <?php } }?>
        </tbody>
    </table>
</div>

<?php
// $contenu = ob_get_clean();

?>

