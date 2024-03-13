<?php
require '../Settings/config.php';
class registerController{
    public function register(){
        View::view('register');
    }
    public function create_user(){
        session_start();
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $sql = "INSERT INTO users (name, password, email) VALUES ('$username', '$password', '$email')";
            $result = Config::insert($sql);
            if($result == 'success'){
                $sql = "SELECT * FROM users WHERE email LIKE '$email' LIMIT 1;";
                $user = Config::select($sql);
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $user;
                AuthController::decision();
            }else{
                echo 'HATA : Register Islemi Yapilmamis';
            }
        }else{
            echo 'Beklenmeyen Bir Hata ! Lutfen Daha Sonra Tekrer Deneyen';
        }
    }
}