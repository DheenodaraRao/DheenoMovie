<?php

class Login extends Controller{

    function __construct(){
        parent::__construct();

    }

    public function login(){
        $this->view->success = true;
        $this->view->render('login/loginPage');
    }

    public function validate(){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $model = new LoginModel();

        $validUser = $model->validateUser($username, $password);

        if($validUser){
            Session::init();
            Session::set('loggedIn', true);
            header('Location: /DheenoMovie/Management/viewMovies');
            exit;
        }
        else{
            $this->view->success = false;
            $this->view->render('login/loginPage');
        }
    }
        
}