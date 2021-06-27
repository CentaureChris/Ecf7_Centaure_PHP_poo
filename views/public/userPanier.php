<?php ob_start(); 
require_once('./views/public/templatePublic.php');
// session_start();
// var_dump($_SESSION['panier']);
// echo '<br />';
// echo $_SESSION['panier'][1]->getId();
$articles = $_SESSION['panier'];
$total = 0;
$totalArt = 0;
foreach($articles as $pan){
    $total += ($pan->getNbrarticle()* $pan->getPrix());
    $totalArt  += ($pan->getNbrarticle());
  }

?>
<?php
  if(count($articles) === 0){
    echo "<h1 class='text-center text-white' style='background:transparent;'>Votre panier est vide </h1>";
}else{ ?>
<div style="background-color:white;">

<h1 class="text-center">Panier</h1>
<table class="table table-stripped" >
    <thead>
        <tr>
            <th>Image</th>
            <th>nom Produit</th>
            <th>quantite</th>
            <th>prix Produit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
    <?php 
  
        foreach($articles as $art){ ?>
        <tr>
            <td><img src="./assets/images/<?= $art->getImage() ?>" style="width:100px;"/> </td>
            <td><?= $art->getModele(); ?></td>
            <td> <?= $art->getNbrarticle() ?></td>
            <td> <?= $art->getPrix() ?> €</td>
            <td><a href="index.php?action=deleteItem&id=<?= $art->getId() ?>"><button class="btn btn-danger"><i class="fas fa-trash "></i></button></a></td>
        </tr>
        </li>
    <?php } ?>
        <form>

            <th>Prix Total</th>
            <td> <input type="email"id="email" class="form-control" placeholder="entrer votre email pour confirmer le paiement"> </td>
        
            <td id="totalArt"><?= $totalArt ?> <?php if($totalArt === 1){ ?> Article <?php }else{ ?> Articles <?php } ?> </td>
            <td ><?= $total ?> € </td>
            
            <input type="hidden" id="quant" class="form-control text-end" min="1" value="1"  >
            <!-- <input type="hidden" id="ref" value="1"> -->
            <input type="hidden" id="name" value="Votre panier GAMESTORE">
            <!-- <input type="hidden" id="marque" value="store"> -->
            <input type="hidden" id="prix" value="<?= $total;?>">
            <!-- <input type="hidden" id="nb" value="3"> -->

            <td><button  class="btn btn-outline-success" type="submit" id="checkout-button2" >Payer</button></td>
        </form>
        <?php } ?>

    </tr>
   </tbody>
</table>
<div id="errorMsg"></div>
</div>


