<?php

class ManagementModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function viewMovie(){
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

    public function editMovie($id){
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

    public function saveMovie($title, $year, $genre, $synopsis){
        $query = 'Select id from Genre where name = "'.$genre.'"';
        $data = $this->db->query($query);
        $genreId;

        while($row = $data->fetch_assoc()){
            $genreId = $row["id"];
        }

        $stmt = $this->db->prepare("Insert into Movie(title, year, genreId, synopsis) values 
        (?, ?, ? , ?)");

        $stmt->bind_param("ssss",$title, $year, $genreId, $synopsis);

        $stmt->execute();
    }

    public function updateMovie($movieId, $title, $year, $genre, $synopsis){
        $stmt = $this->db->prepare('Update Movie
        set title=?, year=?, genreId = ?, synopsis=?
        where movieId=?');
        
        $stmt->bind_param("sssss", $title, $year, $genre, $synopsis, $movieId);

        $stmt->execute();
    }

    public function deleteMovie($movieId){
        $stmt = $this->db->prepare('Delete from Movie where movieId=?');
        
        $stmt->bind_param("i", $movieId);

        $stmt->execute();
    }

    public function getLastRow(){
        $query = "Select MAX(movieId) from Movie";
        $data = $this->db->query($query);
        $rowCount = 0;

        while($row = $data->fetch_assoc()){
            $rowCount = (int)$row["MAX(movieId)"];
        }
        return $rowCount;
        
    }

    public function getGenreId($genre){
        $query = 'Select id from Genre 
        where name="'.$genre.'"';

        $data = $this->db->query($query);

        while($row = $data->fetch_assoc()){
            $genreId = $row["id"];
        }
        return $genreId;
    }
}

?>