<?php

class AdminUserController
{

    private $aduser;

    public function __construct()
    {
        $this->aduser = new AdminUserModel();
    }


    public function listUser()
    {
        $users = $this->aduser->getUsers();
    
        require_once('./views/admin/users/adminUserItem.php');

    }

    public function removeUser()
    {
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);
            $nbLine = $this->aduser->deleteUser($id);

            if($nbLine > 0){
                header("location: index.php?action=list_user");
            }
        }
    }
    public function inscription()
    {

        $tabUser = $this->aduser->getUsers();

        if(isset($_POST['submit'])){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && strlen($_POST['pass']) >= 1){

                $user= new User();
                $nom = trim(htmlentities(addslashes($_POST['nom'])));
                $prenom = trim(htmlentities(addslashes($_POST['prenom'])));
                $email = trim(htmlentities(addslashes($_POST['email'])));
                $login = trim(htmlentities(addslashes($_POST['login'])));
                $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
                $statut = 1;
                $rank = trim(htmlentities(addslashes($_POST['rank'])));

                $user->setNom($nom);
                $user->setPrenom($prenom);
                $user->setEmail($email);
                $user->setLogin($login);
                $user->setPass($pass);
                $user->setStatut($statut);
                $user->getRank()->setId_rank($rank);

                $ok = $this->aduser->register($user);

                if($ok){
                    header('location:index.php?action=list_user');
                }else{
                    echo 'nope';
                }
            }
        }
        require_once('./views/admin/users/inscription.php');
    }

    public function login(){

        if(isset($_POST['submit'])){
            if(strlen($_POST['pass']) >= 1 && !empty($_POST['loginEmail'])){
                $loginEmail = $_POST['loginEmail'];
                $pass = $_POST['pass'];
                $data_u = $this->aduser->signIn($loginEmail,  $pass);
               if(!empty($data_u)){
                    if($data_u->statut > 0){
                        session_start();
                        $_SESSION['Auth'] =  $data_u;
                        header('location:index.php?action=list_console');
                    }else{
                        $error = "Votre compte a été supprimé";
                    }
                }else{
                    $error = "Votre login/email ou/et mot de passe ne correspondent pas";
                }
            }else{
                $error = "Entrée les données valides";
            }
        }

        require_once('./views/admin/users/login.php');
    }
}
