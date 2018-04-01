
<?php include_once("views/mgnt.php"); ?>
<?php
$data = $this->msg;


for($i = 0; $i < count($data); $i++){
    $movieId = $data[$i]["movieId"];
    $title = $data[$i]["title"];
    $year = $data[$i]["year"];
    $genre = $data[$i]["genre"];
    $synopsis = $data[$i]["synopsis"];
}

?>
<div id="movieForm">
<form action="/DheenoMovie/Management/saveChanges" method="POST" name="editForm" onsubmit="return validateEdit()">
<div id="formTitle">
    Edit Movie
</div>

<div id="formLabel">
    Movie Id
</div>
<input type="text" name="movieId" readonly value="<?php echo($movieId); ?>">

<div id="formLabel">
    Title
</div>
<input type="text" name="title" value="<?php echo($title); ?>">

<div id="formLabel">
    Year
</div>
<input type="text" name="year" value="<?php echo($year); ?>">

<div id="formLabel">
    Genre
</div>

<select name="genre" value="<?php echo($genre); ?>">
<?php
$genres = ["Action", "Comedy", "Family", "Romantic"];
foreach($genres as $gen){
    if($gen == $genre){
        echo('<option value="'.$gen.'" selected>'.$gen.'</option>');
    }
    else{
        echo('<option value="'.$gen.'">'.$gen.'</option>');
    }
}
?>
</select>

<div id="formLabel" >
    Synopsis
</div>
<textarea name="synopsis"><?php echo($synopsis);?></textarea>


<br>
<div id="submitButton">
<input type="submit" value="Update Movie">
</form>
</div>

<form action="/DheenoMovie/Management/deleteMovie" method="POST" onsubmit="return confirm('Delete Movie?')">
<input type="hidden" name="movieId" value="<?php echo($movieId); ?>">
<div id="deleteButton">
<input type="submit" value="Delete Movie">
</div>
</form>