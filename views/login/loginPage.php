<?php

if($this->success != true){
    echo('<script> window.alert("Wrong Credentials")</script>');
}

?>

<div id="loginForm">
<form action="/DheenoMovie/Login/validate" method="POST" autocomplete="off" name="loginForm" onsubmit="return validateLogin()">
<div id="formTitle">
    Login
</div>
<div id="loginLabel" >
    UserName
</div>

<div id="inputLogin">
    <input type="text" name="username"/><br>
</div>

<div id="loginLabel">
Password
</div>

<div id="inputLogin">
<input type="text" name="password"/><br>
</div>


<div id="loginButton">
    <input type="submit" name="submit" value="Login" />
</div>

<div id="loginButton">
<input type="reset" name="reset" value="Reset" />
</div>

</form>

</div>