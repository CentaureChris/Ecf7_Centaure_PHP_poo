<?php

class AdminUserModel extends Driver{

    public function getUsers()
    {
        $sql ="SELECT * FROM user u
                INNER JOIN rank r
                ON u.rank = r.id_rank";

        $result = $this->getRequest($sql);

        $users = $result->fetchAll(PDO::FETCH_OBJ);
        $datas = [];

        foreach($users as $user){

            $u = new User();

            $u->setId_user($user->id_user);
            $u->setNom($user->nom);
            $u->setPrenom($user->prenom);
            $u->setEmail($user->email);
            $u->setLogin($user->login);
            $u->setPass($user->pass);

            $u->getRank()->setId_rank($user->id_rank);
            $u->getRank()->setNom_rank($user->rank);
            $u->setStatut($user->statut);

            array_push($datas,$user);

        }
        return $datas;
    }

    public function updateStatut(User $user)
    {
        $sql ="UPDATE user SET statut = :statut WHERE id = :id";
        $result = $this->getRequest($sql,["statut"=>$user->getStatut(),"id"=>$user->getId_user()]);
        return $result->rowCount();
    }

    public function deleteUser($id){
        $sql = "DELETE FROM user WHERE id_user = :id";
        $result = $this->getRequest($sql,["id"=>$id]);
        $nb= $result ->rowCount();
        return $nb;
    }

    public function register(User $user)
    {

        $sql = "SELECT * FROM user WHERE email = :email";
        $result = $this->getRequest($sql,["email"=>$user->getEmail()]);

        if($result->rowCount() == 0){

            $req = "INSERT INTO user (nom, prenom , login, pass, email, statut, rank)
                    VALUES (:nom, :prenom , :login, :pass, :email, :statut, :rank)";
            $tabUsers = ["nom"=>$user->getNom(),"prenom"=>$user->getPrenom(),"login"=>$user->getLogin(),"pass"=>$user->getPass(),"email"=>$user->getEmail(),"statut"=>$user->getStatut(),"rank"=>$user->getRank()->getId_rank()];
            $res = $this->getRequest($req,$tabUsers);
            return $res;
        }else{
            return "Cet Utilisateur Existe déja!!";
        }
    }

    public function signIn($loginEmail,$pass)
    {
        $sql = "SELECT * FROM user
                WHERE (login = :logEmail OR email = :logEmail) AND pass = :pass";
        $result = $this->getRequest($sql,['logEmail'=>$loginEmail,"pass"=>$pass]);

        $row = $result->fetch(PDO::FETCH_OBJ);

        return $row;
    }
}
// $adminUser = new AdminUserModel();
// echo "<pre>";
// var_dump($adminUser->getUsers());
// echo "</pre>";
