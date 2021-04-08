<?php

require_once('./models/Driver.php');

require_once('./models/Console.php');
require_once('./models/admin/AdminConsoleModel.php');
require_once('./controllers/admin/AdminConsoleController.php');

require_once('./models/Marque.php');
require_once('./models/admin/AdminMarqueModel.php');
require_once('./controllers/admin/AdminMarqueController.php');

require_once('./models/User.php');
require_once('./models/admin/AdminUserModel.php');
require_once('./controllers/admin/AdminUserController.php');

require_once('./models/Type.php');
require_once('./models/admin/AdminTypeModel.php');

require_once('./models/Rank.php');

require_once('./controllers/admin/AuthController.php');

require_once('./controllers/public/PublicController.php');
require_once('./models/public/PublicModel.php');







class Router{

    private $ctrc;
    private $ctrm;
    private $ctrus;
    private $ctrpub;



    public function __construct()
    {
        $this->ctrm = new AdminMarqueController();  
        $this->ctrc = new AdminConsoleController();
        $this->ctrus = new AdminUserController();
        $this->ctrpub = new PublicController();
        
           

    }

    public function getPath()
    {
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case 'list_console':
                    AuthController::isLogged();
                    $this->ctrc->listConsole();
                    break;

                case 'delete_console':
                    AuthController::isLogged();
                    $this->ctrc->deleteConsole();
                    break;

                case 'add_console':
                    AuthController::isLogged();
                    $this->ctrc->addConsole();
                    break;

                case 'edit_console':
                    AuthController::isLogged();
                    $this->ctrc->editConsole();
                    break;

                case 'list_marque':
                    AuthController::isLogged();
                    $this->ctrm->listMarque();
                    break;

                case 'list_user':
                    AuthController::isLogged();
                    $this->ctrus->listUser();
                    break;

                case 'delete_user':
                    AuthController::isLogged();
                    $this->ctrus->removeUser();
                    break;

                case 'inscription':
                    AuthController::isLogged();
                    AuthController::accesAdmin();
                    $this->ctrus->inscription();
                    break;
            
                case 'login':
                    $this->ctrus->login();
                    break;
                
                case 'logout':
                    AuthController::logout();
                    break;

                case 'checkout':
                    $this->ctrpub->recap();
                    break;

                case 'pay':
                    $this->ctrpub->payment();
                    break;
                
                case 'success':
                    $this->ctrpub->confirmation();
                    break;
            
                case 'cancel':
                    $this->ctrpub->annulation();
                    break;
    

                // case 'order':
                //     $this->ctrpub->orderCar();
                //     break;
                }
            }else{
                $this->ctrpub->getPubConsole();
            }
        }
}