<?php
session_start();


class AuthController{

    public static function isLogged()
    {
        if(!isset($_SESSION['Auth'])){
            header('location:index.php?action=login');
        }
    }

    public static function logout()
    {
        unset($_SESSION['Auth']);
        header('location:index.php?action=login');
    }

    public static function accesUser()
    {
        if($_SESSION['Auth']->rank >= 3){
            header('location:index.php?action=login');
            exit;
        }
    }

    public static function accesAdmin()
    {
        if($_SESSION['Auth']->rank != 1){
            header('location:index.php?action=login');
            exit;
        }
    }
}
