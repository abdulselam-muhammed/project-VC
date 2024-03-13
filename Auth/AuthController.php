<?php

class AuthController{
    public function login(){
        View::view('login');
    }
    public function welcome(){
        View::view('welcome');
    }
    
    public function create_login_session(){
        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email LIKE '$email' LIMIT 1;";

       $result = Config::select($sql);
       if(count($result) > 0){
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $result;
       }else{
        $_SESSION['loggedin'] = false;
        $_SESSION['user'] = 'No user'; 
       }
       self::decision();
    }
    public static function decision(){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            header("Location: /todo/to/welcome", true, 303);
            exit();
        }else{
            header("Location: /todo/index", true, 303);
            exit();  
        }
    }
}