<?php include_once("views/mgnt.php"); ?>

<p id="ManagementNotes">
To Edit/Update & Delete Movie - Click on the movie that you want to perform the action<br>
</p>

<form action="/DheenoMovie/Management/searchMovie" method="POST" name="searchBox" onsubmit="return validateSearch()">
<input type="hidden" name="type" value="search">
<input type="text" name="searchText">
<input type="Submit" name="Submit" value="Search Title">
</form>



<?php
$data = $this->msg;
    
for($i = 0; $i < count($data); $i++){
    echo('<p class="floatBox" onClick="editMovie(this)" name="'.$data[$i]["movieId"].'" >');
    echo('<img class="movieImg" src="/DheenoMovie/images/'.$data[$i]["movieId"].'.jpeg" />');
    echo($data[$i]["title"]);
    echo('</p>');
} 
?>