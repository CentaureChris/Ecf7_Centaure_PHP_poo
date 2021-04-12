<?php ob_start(); 
// var_dump($console);
require_once('./views/public/templatePublic.php');

?>


<div class="container">
        <div id="carouselExampleControls" class="carousel slide  carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./assets/images/wall1.jpeg" class="d-block w-100 " style="height:500px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/wall2.jpeg" class="d-block w-100" style="height:500px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/wall3.jpeg" class="d-block w-100" style="height:500px" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
          </div>
          <!---end carrousel-->
          <div class="row my-3">
              <div class="col-8">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php if(is_array($console)){ foreach($console as $car) { ?>
                    <div class="col">
                      <div class="card">
                        <img src="./assets/images/<?= $car->getImage() ?>" class="card-img-top" alt="..." width="200px" height="200px">
                        <div class="card-body">
                          <h5 class="card-title"><?= strtoupper($car->getModele()) ?></h5>
                          <p class="card-text"></p>
                          <ul class="list-group list-unstyled">
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Marque 
                            <?php if($car->getMarque()->getId_marque() == 1){ ?>
                              <span class="badge bg-primary rounded-pill"><i class="fab fa-playstation"></i> <?= strtoupper($car->getMarque()->getNom_marque()) ?></span>
                              <?php }elseif($car->getMarque()->getId_marque() == 2){ ?>
                                <span class="badge bg-success rounded-pill"><i class="fab fa-xbox"></i> <?= strtoupper($car->getMarque()->getNom_marque()) ?></span>
                              <?php }else{ ?>
                                <span class="badge bg-dark rounded-pill"><?= strtoupper($car->getMarque()->getNom_marque()) ?></span>
                             <?php } ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Capacité
                              <span class="badge bg-primary rounded-pill"><?= $car->getCapacite() ?> go</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Quantite 
                              <span class="badge bg-primary rounded-pill"><?= $car->getQuantite() ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Prix:
                              <span class="badge bg-primary "><?= $car->getPrix() ?> €</span>
                            </li>

                            <form action="index.php?action=checkout" method="post">

                            
                          <input type="hidden" value="<?= $car->getId() ?>" name="id">
                          <input type="hidden" value="<?= $car->getMarque()->getNom_marque() ?>" name="marque">
                            <input type="hidden" value="<?= $car->getModele() ?>" name="modele">
                            <input type="hidden" value="<?= $car->getPrix() ?>" name="prix">
                            <input type="hidden" value="<?= $car->getImage() ?>" name="image">
                            <input type="hidden" value="<?= $car->getQuantite() ?>" name="quantite">

                            
                            

                            <?php if($car->getQuantite() !=0 ){ ?>
                            <li class="text-end">
                                <button class="btn btn-success m-2" name="envoyer" >Acheter</button>
                            </li>
                            <?php }else{ ?>
                                <li class="text-end">
                                    <button class="btn btn-warning m-2" type="submit" name="envoyer" >Passer Commande</button>
                                </li>
                            
                            <?php } ?>
                            </form>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <?php } }else{ ?>
                    <h2 class="text-white m-5">
                    <?= $console ?>
                    </h2>
                    <?php } ?>
                    <div class="col">
                    
                    </div>
              </div>
            </div>
              <!--end cards-->
              
                <div class="card col-3 " style="height: 300px;">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group m-2">
                        <input class="form-control text-center " type="search" name="search" id="search" placeholder="Rechecher...">
                        <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
                      
                     </form>

                     <h4>Marques</h4>

                     <?php foreach($tabMar as $cat){ ?>
                     <li class="list-group-item text-center m-1"><a class= "btn text-center" href="index.php?id=<?= $cat->getId_marque(); ?>"><?= strtoupper($cat->getNom_marque()); ?></a></li>
                        <?php } ?>

                  </div> 
          
    </div>
    <?php
require_once('footerPublic.php');
// $contenu= ob_get_clean();
?>