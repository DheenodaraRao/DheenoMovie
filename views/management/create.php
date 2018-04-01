<?php include_once("views/mgnt.php"); ?>

<div id="movieForm">
<form action="/DheenoMovie/Management/saveMovie" method="POST" enctype="multipart/form-data" name="createMovie" onsubmit="return validateCreate()">
<div id="formTitle">
    Create Movie
</div>
<div id="formLabel">
    Title
</div>
<input type="text" name="title">

<div id="formLabel">
    Year
</div>
<input type="text" name="year">

<div id="formLabel">
    Genre
</div>
<select name="genre">
    <option value="Action">Action</option>
    <option value="Comedy">Comedy</option>
    <option value="Family">Family</option>
    <option value="Romantic">Romantic</option>
</select>

<div id="formLabel">
    Synopsis
</div>
<textarea name="synopsis"></textarea>

<div id="formLabel">
    Upload Movie Image
</div>

<input type="file" name="movieImage" id="fileToUpload" accept=".jpeg">

<br><br>
<div id="submitButton">
<input type="submit" value="Create">
</div>
</form>

</div>