<?php

ob_start();
require_once('./views/templateAdmin.php');


// var_dump($allUsers);
?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h1 class="font-monospace text-center">Formulaire de Connexion</h1>

            <?php if(isset($error)){ ?>
<div class="alert alert-danger text-center"><?= $error ?></div>
            <?php } ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="loginEmail">Email ou Login</label>
                
                <input type="text" id="loginEmail" name="loginEmail" class="form-control" placeholder="Entrer votre login ou email....." />

                <label for="pass">Mot de Passe</label>
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Entrer votre mot de passe....." />

                <button type="submit" class="btn btn-success col-12 mt-2" name="submit">Submit</button>
                
            </form>
            
        </div>
    </div>
</div>

<?php
// $contenu = ob_get_clean();
// echo $contenu;

?>