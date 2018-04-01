<?php

class IndexModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function existingGenre(){
        $query = "select name from Genre where id in (Select distinct genreId from Movie)";

        $data = $this->db->query($query);

        $return_data = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {
                array_push($return_data,$row["name"]);
            } 
        }

        return $return_data;
    }

    public function selectGenre()
    {
        $query = "Select name from Genre";
        $data = $this->db->query($query);

        $return_data = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {
                array_push($return_data,$row["name"]);
            } 
        }

        return $return_data;
    }

    public function matchGenre($name)
    {
        $query = 'Select id from Genre where name="'.$name.'"';
        $data = $this->db->query($query);

        $return_data = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {

                array_push($return_data,$row["id"]);
            } 
        }

        return $return_data;
    }

    public function selectYear()
    {
        $query = "Select distinct year from Movie";
        $data = $this->db->query($query);

        $return_data = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {
                array_push($return_data,$row["year"]);
            } 
        }

        return $return_data;
    }
    
    public function selectMovies($type, $filter){
        $query = 'Select movieId, title from Movie where '.$type.' = "' .$filter.'"';
        $data = $this->db->query($query);

        $return_data = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {
                $movie = array("movieId" =>$row["movieId"], 
                "title" => $row["title"]);
                
                array_push($return_data,$movie);
            } 
        }

        return $return_data;
    }

    public function searchKeyWord($keyWord){
        $query = 'Select movieId, title from Movie where title LIKE "%'.$keyWord.'%"';
        $data = $this->db->query($query);

        $return_data = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {
                $movie = array("movieId" =>$row["movieId"], 
                "title" => $row["title"]);
                
                array_push($return_data,$movie);
            } 
        }

        return $return_data;
    }

    public function selectAllMovies(){
        $query = 'Select movieId, title from Movie';
        $data = $this->db->query($query);

        $return_data = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {
                $movie = array("movieId" =>$row["movieId"], 
                "title" => $row["title"]);
                
                array_push($return_data,$movie);
            } 
        }

        return $return_data;
    }

    public function getDetails($id){
        $query = 'Select m.movieId,m.title, m.year,g.name as genre, m.synopsis
        from Movie as m,Genre as g
        where g.id = m.genreId
        and m.movieId = "'.$id.'"';

        $data = $this->db->query($query);

        $return_data = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {
                $movie = array("movieId" =>$row["movieId"], 
                "title" => $row["title"], "year" => $row["year"], 
                "genre" => $row["genre"], "synopsis" => $row["synopsis"]);
                
                array_push($return_data,$movie);
            } 
        }

        return $return_data;
    }

    public function getByYear(){
        $query = "select distinct year from Movie order by year desc";
        $data = $this->db->query($query);
        $returnData = [];
        $years = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {
                $year = $row["year"];
                array_push($years,$year);
            } 
        }

        for($i = 0; $i < count($years); $i++){
            $query = 'select movieId, title from Movie where year ="' .$years[$i]. '"';
            $data = $this->db->query($query);
            $movieYear = [];
            if($data->num_rows > 0){

                while($row = $data->fetch_assoc()) {

                $movie = array("movieId" =>$row["movieId"], 
                "title" => $row["title"]);

                    array_push($movieYear,$movie);
                } 
            }
            $list = array($years[$i], $movieYear);
            array_push($returnData,$list);
        }
        return $returnData;
    }

    public function getByGenre(){
        $query = "select name from Genre";
        $data = $this->db->query($query);
        $returnData = [];
        $genres = [];

        if($data->num_rows > 0){

            while($row = $data->fetch_assoc()) {
                $genre = $row["name"];
                array_push($genres,$genre);
            } 
        }

        for($i = 0; $i < count($genres); $i++){
            $query = 'select m.movieId, m.title from Movie as m,Genre as g
            where m.genreId = g.id and g.name = "' .$genres[$i]. '"';
            $data = $this->db->query($query);
            $movieGenre= [];
            if($data->num_rows > 0){

                while($row = $data->fetch_assoc()) {

                $movie = array("movieId" =>$row["movieId"], 
                "title" => $row["title"]);

                    array_push($movieGenre,$movie);
                } 
            }
            $list = array($genres[$i], $movieGenre);
            array_push($returnData,$list);
        }
        return $returnData;
    }

}

?>