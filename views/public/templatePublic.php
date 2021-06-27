<?php 
  $panier = $_SESSION['panier'];
  // var_dump($panier);
  $totalArt = 0;
  // echo $panier[1]->getNbrarticle();
  foreach($panier as $pan){
    $totalArt += $pan->getNbrarticle();
  }
  // echo $totalArt;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vente Console</title>
  <link rel="stylesheet" href="./assets/CSS/templatePublic.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
<header>
<div style="display:flex; justify-content:space-between;align-items:center; padding: 15px;">
<a href="index.php" class="text-white"><i class="fas fa-home fa-3x"></i></a>
<img src="./assets/images/GameStore_Logo.jpeg" style="width:200px; border-radius:30px;" alt="">
<span></span>
</div>
<div style="position: fixed;right: 10px;z-index: 999;top: 50px;">
  <a class="btn btn-dark" style="color:white;" href="index.php?action=panier"><i class="fas fa-shopping-cart fa-2x" ><?= $totalArt ?></i></a>
</div>

</header>
<main>

</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./assets/JS/templatePublic.js"></script>
<script src="./assets/JS/scriptStripes.js"></script>
<script src="https://js.stripe.com/v3/"></script>
</body>
</html>