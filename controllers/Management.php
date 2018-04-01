<?php

class Management extends Controller{

    public function __construct(){
        parent::__construct();
        Session::init();

        $logged = Session::get('loggedIn');
        if($logged == false){
            Session::destroy();
            header('Location: /DheenoMovie/Login/login');
            exit;
        }
    }

    public function viewMovies(){
        //home page of management dashboard
        //view movie list by year
        //show create movie button and edit movie button
        //clicking on the movies redirect to edit movie
        $model = new ManagementModel();
        $data = $model->viewMovie();
        $this->view->msg = $data;
        $this->view->render('management/home');
        

    }

    public function searchMovie(){
        $searchTitle = $_POST['searchText'];

        $model = new ManagementModel();
        $data = $model->searchKeyWord($searchTitle);
        $this->view->msg = $data;
        $this->view->render('management/home');
    }

    public function createMovie(){
        //render form for movie creation
        //post of form should come to save movie
        $this->view->render('management/create');
    }

    public function saveMovie(){
        //get parameters from createMovie()
        //execute the saving of image
        //execute the data insertion by calling model function
        //redirect user to viewMovies
    
        //GET model
        $model = new ManagementModel();
        

        $title = $_POST['title'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $synopsis = $_POST['synopsis'];
        
        $model->saveMovie($title, $year, $genre, $synopsis);

        $rowCount = $model->getLastRow();
        $movieId = $rowCount;
        
        
        $target_dir = "images/";
        $tempLocation = $_FILES["movieImage"]["tmp_name"];   
        $newFileName = $target_dir.$rowCount.".jpeg";

        $fileUpload = move_uploaded_file($tempLocation, $newFileName);

        header("Location: /DheenoMovie/Management/viewMovies");
        exit();

    }

    public function editMovie($id){
        //get data from database
        //display form with predefined values
        //show update and delete button, which each responding respectively
        $model = new ManagementModel();
        $data = $model->editMovie($id);
        $this->view->msg = $data;
        $this->view->render('management/editMovie');

    }

    public function saveChanges(){
        //get form parameters from edit movie after update button is clicked
        //execute update query
        //redirect to view movies
        $model = new ManagementModel();

        $movieId = $_POST['movieId'];
        $title = $_POST['title'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $synopsis = $_POST['synopsis'];

        $genreId = $model->getGenreId($genre);
        
        $model->updateMovie($movieId, $title, $year, $genreId, $synopsis);

        header("Location: /DheenoMovie/Management/viewMovies");
        exit();
    }

    public function deleteMovie(){
        //get form id from the form
        //execute the delete query
        //redirect to view movies
        $model = new ManagementModel();

        $movieId = $_POST['movieId'];
        var_dump($movieId);
        $success = $model->deleteMovie($movieId);

        unlink('images/'.$movieId.'.jpeg');

        header("Location: /DheenoMovie/Management/viewMovies");
        exit();
    }

    public function logout(){
        //kill session
        //redirect to user home page
        Session::destroy();
        header("Location: /DheenoMovie/Index");
        exit();
    }
}

?>