<?php

class Bootstrap{

    function __construct()
    {
        if(isset($_GET['url'][0]))
        {
            $url = rtrim($_GET['url'], '/');
            $url = explode('/', $url);

            $file = 'controllers/'.$url[0].'.php';

            if(file_exists($file)){

                require_once('controllers/'.$url[0].'.php');
            
                if($url[0] == "Index" && isset($url[1])){
                require_once('controllers/Index.php');
                require_once('models/index_model.php');
                $controller = new Index();
                if(isset($url[2])){
                    $controller->{$url[1]}($url[2]);
                }
                else{
                    $controller->{$url[1]}();
                }
                
                }
                else if($url[0] == "Index"){
                require_once('controllers/Index.php');
                require_once('models/index_model.php');
                $controller = new Index();
                $controller->index();
                }
                else if($url[0] =="Login" && isset($url[1])){
                require_once('controllers/Login.php');
                require_once('models/login_model.php');
                $controller = new Login();
                $controller->{$url[1]}();
                }

                else if($url[0]=="Management"){
                    require_once('controllers/Management.php');
                    require_once('models/management_model.php');
                    $controller = new Management();

                    if(isset($url[2])){
                        $controller->{$url[1]}($url[2]);
                    }
                    else{
                        $controller->{$url[1]}();
                    }
                    
                }
            }
            
            else{
                require_once('controllers/errorController.php');
                $controller = new ErrorController();
            }
        }
        else if(empty($url[0])){
            require('controllers/Index.php');
            $controller = new Index();
            require('models/index_model.php');
            $controller->index();
        }
        
        
    }
}
?>