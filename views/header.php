<html>

<head>
    <title>Dheeno Movie</title>
    <link rel="stylesheet" type="text/css" href="<?php echo(URL); ?>public/css/mystyle.css">
    <link rel="shortcut icon" href="<?php echo(URL); ?>public/images/favicon.ico">
    <script src="/DheenoMovie/public/js/myjs.js"></script>
</head>

<body id="mainBody">
    <div id="navigation">
        <nav>
            <ul>
                <li><a href="<?php echo(URL); ?>Index">Home</a></li>
                <li>
                <?php if(Session::get('loggedIn') == true): ?>
                    <a href="<?php echo URL;?>Management/logout">Logout</a>
                <?php else: ?>
                    <a href="<?php echo URL;?>Login/login">Management</a>
                <?php endif;?>
                </li>
            </ul>
        </nav>
    </div>

    <div id="content">


