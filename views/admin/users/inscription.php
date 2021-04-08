<?php ob_start();
// var_dump($tabUser);
require_once('./views/templateAdmin.php');

?>

<div class="container">

<h2 class="text-center font-monospace">Ajout d'un Utilisateur</h2>
    <div class="row">
        <div class="col-6 offset-3">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            
            <div class="row">

            <div class="col">
            <label for="nom">Nom </label>
            <input type="text" id="nom" name="nom" class="form-control" />
            </div>
            <div class="col">
            <label for="prenom">Prenom </label>
            <input type="text" id="prenom" name="prenom" class="form-control"  />
            </div >
            </div>

            <div class="">
            <label for="email">Email </label>
            <input type="text" id="email" name="email" class="form-control "  />
            </div>
            
            <div class="row">
            <div class="col-8">
            <label for="login">Login </label>
            <input type="text" id="login" name="login" class="form-control" />
            </div>

            <div class="col-3">
            <label for="grade">Grade </label>
            <select id="id_g" name="rank" class="form-control">
                <option value="">Choisir</option>
               <?php foreach ($tabUser as $grade) {; ?>
                   <option value="<?=$grade->id_rank; ?>"> <?=$grade->nom_rank ; ?> </option>
             <?php };?>
            </select>
            </div>

            <div class="col-8">
            <label for="pass">Password </label>
            <input type="text" id="pass" name="pass" class="form-control" />
            </div>
        
            </div>
            <button type="submit" class="btn btn-success col-12 mt-2" name="submit">Inscrire</button>
            
            </form>
            
        </div>
    </div>
</div>

<?php 
    // $contenu = ob_get_clean();
    ?>