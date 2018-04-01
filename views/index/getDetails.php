<?php
$data = $this->msg;


for($i = 0; $i < count($data); $i++){
    echo('<div " id="fullDetails" name="'.$data[$i]["movieId"].'" <div>');
    echo('<img src="/DheenoMovie/images/'.$data[$i]["movieId"].'.jpeg" /> <br>');
    echo('<p>');
    echo("Title: ".$data[$i]["title"]);
    echo('<br>');
    echo("Year: ".$data[$i]["year"]);
    echo('<br>');
    echo("Genre: ".$data[$i]["genre"]);
    echo('<br>');
    echo("Synopsis: ".$data[$i]["synopsis"]);
    echo('<br>');
    echo('</p>');
    echo('</div>');
}

?>