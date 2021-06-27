

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/CSS/templateAdmin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper --> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<style>
body{
  background-image: url('./assets/images/adminwp.jpeg')!important ;
    background-repeat: no-repeat;
    background-attachment: fixed;
    
}
</style>
<body>
  <h3 class="m-3"><a href="index.php" class="text-white"><i class="fas fa-home">Accueil</i></a></h3>
  <?php if(isset($_SESSION['Auth'])){ ?>
<h3 class="m-3 text-end">Bienvenue <?= ucfirst($_SESSION['Auth']->nom)." ".ucfirst($_SESSION['Auth']->prenom)  ;?> </h3>
   <ul class="menu cf" >
  <li><a href="index.php?action=logout" class="" onclick="return confirm('Valider la deconnexion?')"><i class="fas fa-sign-out-alt" ></i> Quitter</a></li>
  <li>
    <a href="index.php?action=list_console"><i class="fas fa-gamepad fa-2x"></i> Console</a>
 	
  </li>
  <li>
    <a href="index.php?action=list_marque">Marque</a>
  </li>
  <li>
    <a href="index.php?action=list_user"><i class="fas fa-users fa-2x"></i> Utilisateurs</a>		
  </li>
  <li>
    <a href="">Ajouter</a>
    <ul class="submenu">
    <li><a href="index.php?action=add_console">Console <i class="fas fa-plus"></i> <i class="fas fa-gamepad "></i></a></li>
    <li><a href="">Marque <i class="fas fa-plus"></i></a></li>
    <li><a href="index.php?action=inscription" >Utilisateur <i class="fas fa-plus"></i> <i class="fas fa-users"></i></a></li>

      
    </ul>			
  </li>
</ul>
<?php } ?>

</body>
</html>