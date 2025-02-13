<?php
session_start();

use Stripe\Customer;

require('vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class PublicController{

    private $pubmm;
    private $pubcm;
    private $pubm;

    public function __construct()
    {
        $this->pubcm = new AdminConsoleModel();
        $this->pubmm = new AdminMarqueModel();
        $this->pubtm = new AdminTypeModel();

        $this->pubm = new PublicModel();
    }

    public function getPubConsole(){
        
        if(isset($_GET['id']) && !empty($_GET['id'])){
            if( isset($_POST['soumis']) && !empty($_POST['search'])){
                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabMar = $this->pubmm->getMarques();
                $console = $this->pubcm->getConsole($search);
                require_once('./views/public/accueil.php');
            }
            $id = trim(htmlentities(addslashes($_GET['id'])));
            $c = new Console();
            $c->getMarque()->setId_marque($id);
            $tabMar = $this->pubmm->getMarques();
            $cons = $this->pubm->findConsoleByMarque($c);
            require_once('./views/public/consoleMarque.php');
      
        }else{
            if( isset($_POST['soumis']) && !empty($_POST['search'])){
                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabMar = $this->pubmm->getMarques();
                $console = $this->pubcm->getConsole($search);
                require_once('./views/public/accueil.php');
            }
            $tabMar = $this->pubmm->getMarques();
            $console = $this->pubcm->getConsole();
    
        require_once('./views/public/accueil.php');
            }   
        }

    public function addCart()
    {
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
           
            $art = new Console();
            $id = $_GET['id'];
            $art->setId($id);
            // $art->setNbrarticle(1);
            $nb = $this->pubcm->itemConsole($art);
            $nb->setNbrarticle(1);
            $nbr=1;
            $image = $nb->getImage();
            $art->setNbrarticle($nbr);

            $index= -1;
            
            foreach($_SESSION['panier'] as $k => $item){
                if($item->getId() === $id){
                    $index= $k;
                }
            }

            if($index === -1){
                 array_push($_SESSION['panier'],$nb);
            }
            else{
                $_SESSION['panier'][$index]->setNbrarticle( $_SESSION['panier'][$index]->getNbrarticle() + 1);
            }
           
           
            if($nb > 0){
                header('location: index.php');
            }

        require_once('./views/public/accueil.php');

        }
    }

    public function removeArt()
    {
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            $id = $_GET['id'];
            $art = new Console();
            $art->setId($id);
            $nb = $this->pubcm->itemConsole($art);

            foreach($_SESSION["panier"] as $k=> $item) {
			if($_GET["id"] == $item->getId()){
                array_splice($_SESSION["panier"],$k,1);	
            }
        }
            if($nb > 0){
                header('location:index.php?action=panier');
            }
        }
    }

    public function recap()
    {
        if(isset($_POST['envoyer'])){

            $id = htmlspecialchars(addslashes($_POST['id']));
            $marque = htmlspecialchars(addslashes($_POST['marque']));
            $modele = htmlspecialchars(addslashes($_POST['modele']));
            $image = htmlspecialchars(addslashes($_POST['image']));
            $prix = htmlspecialchars(addslashes($_POST['prix']));
            $nb = htmlspecialchars(addslashes($_POST['quantite']));

            require_once('./views/public/consoleItem.php');
        }
    }

   


    // public function orderCar(){
    //     if(isset($_GET['id']) && !empty($_GET['id'])){
    //         $id = addslashes(htmlspecialchars($_GET['id']));
    //         require_once('./views/public/orderForm.php');
    //     }
    // }

    public function payment(){

        if(isset($_POST) && !empty($_POST['quantite'])){

            \Stripe\Stripe::setApiKey
            ('sk_test_51IMCYoCj8A2ZxK62ViKCLX4E0hU0VUdYf2WwpOxRFw2IEfMt6tXTGgGEES1tF7hlhMz9l4PxQhekZa9BNpnQ9h5S00b4Smb9Hb');
            
            header('Content-Type: application/json');
            
            $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $_POST['prix']*100,
                    'product_data' => [
                    'name' => $_POST['marque']." ".$_POST['modele'],
                    'images' => ["https://imgshare.io/images/2021/06/25/".$_POST['image'].""],
                    ],
                ],
                'quantity' => $_POST['quantite'],
                ]],
                'customer_email'=> $_POST['email'],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8888/php/poo/apps/Gamestore/index.php?action=success',
                'cancel_url' =>  'http://localhost:8888/php/poo/apps/Gamestore/index.php?action=cancel',
            ]);
            $_SESSION['pay'] = $_POST;
            echo json_encode(['id' => $checkout_session->id]);
        } 
    }

    public function paymentCart(){

        if(isset($_POST)){

            \Stripe\Stripe::setApiKey
            ('sk_test_51IMCYoCj8A2ZxK62ViKCLX4E0hU0VUdYf2WwpOxRFw2IEfMt6tXTGgGEES1tF7hlhMz9l4PxQhekZa9BNpnQ9h5S00b4Smb9Hb');
            
            header('Content-Type: application/json');
            
            $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $_POST['prix']*100,
                    'product_data' => [
                    'name' => $_POST['name'],
                    'images' => ["https://imgshare.io/images/2021/06/25/GameStore_Logo.jpg"],
                    ],
                ],
                'quantity' => 1,
                ]],
                'customer_email'=> $_POST['email'],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8888/php/poo/apps/Gamestore/index.php?action=successCart',
                'cancel_url' =>  'http://localhost:8888/php/poo/apps/Gamestore/index.php?action=cancel',
            ]);
            $_SESSION['pay'] = $_POST;
            echo json_encode(['id' => $checkout_session->id]);
        } 
    }
    
    public function confirmationCart()
    {
        $_SESSION['panier'] = [];
        require_once('./views/public/confirmPay.php');

    }

    public function confirmation() {
        $newStock = ((int)$_SESSION['pay']['nb']) - ((int)$_SESSION['pay']['quantite']);
        $car = new Console();
        $car->setId($_SESSION['pay']['id']);
        $car->setQuantite($newStock);

        $nbLine = $this->pubm->updateStock($car);
        if($nbLine > 0 ){
            
            //Load Composer's autoloader
            $email = $_SESSION['pay']['email'];
            $marque= $_SESSION['pay']['marque'];
            $modele= $_SESSION['pay']['modele'];
            $prix= $_SESSION['pay']['prix'];
            

            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'c.centaure972@gmail.com';                     //SMTP username
                $mail->Password   = 'mziyzxforjcwijpo';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('c.centaure972@gmail.com', 'GAMES STORE');
                $mail->addAddress("$email", 'Mr/Mme');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = "
                    <h2>Confirmation d'achat</h2>
                    <div>
                        <b>Marque:  </b>".$marque." 
                        <b>Modéle:  </b>".$modele." 
                        <b>Prix:  </b>".$prix." 
                        <p>Nous vous remercions pour votre achat.</p>
                    </div>
                ";
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        require_once('./views/public/confirmPay.php');
 
    }

    public function annuler() {
        require_once('./views/public/cancel.php');
    }
    
}    