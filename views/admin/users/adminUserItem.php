<?php

ob_start();
require_once('./views/templateAdmin.php');
// var_dump($users);
?>
<h1 class="font-monospace text-center">Liste des Utilisateurs</h1>
<div class="container">
    <table class="table table-striped mt-5">
        <thead>
            <tr class="text-center bg-dark text-white">
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Login</th>
                <th>Grade</th>
                <?php if(isset($_SESSION['Auth']) && $_SESSION['Auth']->rank == 1){ ?>
                    <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
    
        <tbody class="text-center">
        <?php if(is_array($users)){foreach($users as $user){ ?>
            <tr>
                <td><?= $user->id_user ?></td>
                <td><?= $user->nom; ?></td>
                <td><?= $user->prenom; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->login ?></td>
                <td><?= $user->nom_rank; ?></td>
                <?php if(isset($_SESSION['Auth']) && $_SESSION['Auth']->rank == 1){ ?>
                <td>
                    <a href="#"><i class="fas fa-pen btn btn-success"></i></a> 
                    <a href="index.php?action=delete_user&id=<?= $user->id_user ?>" onclick="return confirm('Valider la supression??')"><i class="fas fa-trash btn btn-danger"></i></a>
                </td>
                <?php } ?>

            </tr>
            <?php } } ?>
        </tbody>
    </table>
</div>


<?php
$contenu = ob_get_clean();
echo $contenu;


?>