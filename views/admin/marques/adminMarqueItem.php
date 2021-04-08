<?php 
ob_start();

// echo "<pre>";
// var_dump($consoles);
// echo "</pre>";
require_once('./views/templateAdmin.php');

?>

<h1 class ="text-center">Liste Marque</h1>

<div class="container col-5 text-center">
    <table class="table table-striped ">
        <thead>
            <th>Id</th>
            <th>Nom</th>
            
        </thead>
        <tbody>
            <?php if(is_array($marques)){foreach($marques as $marque) { ?>
            <tr>
                <th><?= $marque->getId_marque()?></th>
                <th><?= $marque->getNom_marque()?></th>

            </tr>
            <?php } }?>
        </tbody>
    </table>
</div>

<?php
// $contenu = ob_get_clean();

?>

