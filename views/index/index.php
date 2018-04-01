<div id="Filters">
<form action="/DheenoMovie/Index/index" method="POST" name="searchBox" onsubmit="return validateSearch()">
<input type="hidden" name="type" value="search">
<input type="text" name="searchText">
<input type="Submit" name="Submit" value="Search Title">
</form>

<form action="/DheenoMovie/Index/index" method="POST">
<input type="hidden" name="type" value="genre">
<select name="genre" autofocus>
    <?php 
    $genres = $this->genres;
    foreach($genres as $genre){
        echo('<option value="'.$genre.'">'.$genre.'</option>');
    }
    ?>
</select>
<input type="Submit" name="Submit" value="Search Genre">
</form>

<form action="/DheenoMovie/Index/index" method="POST">
<input type="hidden" name="type" value="year">
<select name="year" autofocus>
    <?php 
    $years = $this->years;
    foreach($years as $year){
        echo('<option value="'.$year.'">'.$year.'</option>');
    }
    ?>
</select>
<input type="Submit" name="Submit" value="Search Year">
</form>

<form action="/DheenoMovie/Index/index" method="POST">
<input type="hidden" name="type" value="all">
<input type="Submit" name="Submit" value="Show All Movies">
</form>
</div>

<?php
$data = $this->msg;
$type = $this->type;


    for($i = 0; $i < count($data); $i++){
        echo('<p class="floatBox" onClick="getDetails(this)" name="'.$data[$i]["movieId"].'" >');
        echo('<img class="movieImg" src="/DheenoMovie/images/'.$data[$i]["movieId"].'.jpeg" />');
        echo($data[$i]["title"]);
        echo('</p>');
    }   


?>
