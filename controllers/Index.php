<?php

class Index extends Controller{

    function __construct()
    {
        parent::__construct();
                
    }

    public function index(){
        $model = new IndexModel();

        $years = $model->selectYear();
        $this->view->years = $years;

        $genres = $model->existingGenre();
        $this->view->genres = $genres;
        
        if(isset($_POST['type'])){

            $type = $_POST['type'];

            if($type == "all"){
            $data = $model->selectAllMovies();
            $this->view->msg = $data;
            $this->view->type = "all";
            }
            else if($type == "search"){

                $searchTitle = $_POST['searchText'];

                $data = $model->searchKeyWord($searchTitle);
                $this->view->msg = $data;
                $this->view->type = "searchKeyword";
            }
            else if($type == "genre"){

                $genre = $_POST['genre'];

                $genreId = $model->matchGenre($genre);
                $data = $model->selectMovies("genreId", $genreId[0]);
                $this->view->msg = $data;
                $this->view->type = "genre";
                
            }
            else if($type == "year"){

                $year = $_POST['year'];
                
                $data = $model->selectMovies("year", $year);
                $this->view->msg = $data;
                $this->view->type = "year";
                
            }
            else if($type =="all"){
                $data = $model->selectAllMovies();
                $this->view->msg = $data;
                $this->view->type = "all";
            }
        }
        else{
            $data = $model->selectAllMovies();
            $this->view->msg = $data;
            $this->view->type = "all";
        }
        $this->view->render('index/index');
        
    }

    public function getDetails($id){
        $model = new IndexModel();
        $data = $model->getDetails($id);
        $this->view->msg = $data;
        $this->view->render('index/getDetails');
    }

    public function getByYear(){
        $model = new IndexModel();
        $data = $model->getByYear();
        $this->view->msg = $data;
        $this->view->type = "year";
        $this->view->render('index/index');
    }

    public function getByGenre(){
        $model = new IndexModel();
        $data = $model->getByGenre();
        $this->view->msg = $data;
        $this->view->type = "genre";
        $this->view->render('index/index');
    }

    
}
?>