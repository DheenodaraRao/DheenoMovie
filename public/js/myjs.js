function getDetails(element){
    var link = "/DheenoMovie/Index/getDetails/" + element.getAttribute("name");
    window.location.replace(link);
}

function getByYear(element){
    var link = "/DheenoMovie/Index/getByYear";
    window.location.replace(link);
}

function getByTitle(element){
    var link = "/DheenoMovie/";
    window.location.replace(link);
}


function getByGenre(element){
    var link = "/DheenoMovie/Index/getByGenre";
    window.location.replace(link);
}

function createMovie(){
    var link = "/DheenoMovie/Management/createMovie";
    window.location.replace(link);
}

function editMovie(element){
    var link = "/DheenoMovie/Management/editMovie/" + element.getAttribute("name");
    window.location.replace(link);
}

function viewMovie(){
    var link = "/DheenoMovie/Management/viewMovies";
    window.location.replace(link);
}

function validateSearch(){
    var x = document.forms["searchBox"]["searchText"].value;
    if (x == "") {
        alert("Type Title");
        return false;
    }
}

function validateLogin(){
    var x = document.forms["loginForm"]["username"].value;
    var y = document.forms["loginForm"]["password"].value;
    if (x == "" || y == "") {
        alert("Enter Both Credential");
        return false;
    }
}

function validateCreate(){
    var title = document.forms["createMovie"]["title"].value;
    var year = document.forms["createMovie"]["year"].value;
    var synopsis = document.forms["createMovie"]["synopsis"].value;
    var img = document.forms["createMovie"]["movieImage"].value;

    if (title == "" || year == "" || synopsis == "" || img == "") {
        alert("Enter All Details");
        return false;
    }

    if(isNaN(year)){
        alert("Enter Number only for year");
        return false;
    }
}

function validateEdit(){
    var title = document.forms["editForm"]["title"].value;
    var year = document.forms["editForm"]["year"].value;
    var synopsis = document.forms["editForm"]["synopsis"].value;

    if (title == "" || year == "" || synopsis == "") {
        alert("Enter All Details");
        return false;
    }

    if(isNaN(year)){
        alert("Enter Number only for year");
        return false;
    }
}
