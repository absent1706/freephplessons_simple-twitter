<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Simple-twitter</title>
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link rel="stylesheet" href="assets/css/styles.css">
        <script src="assets/js/external/jquery-1.11.2.js"></script>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <h1>Simple-twitter </h1>
            </div>
        </div>
        <div class="nav-bar">
            <div class="container">
                <?php render('navbar') ?> 
            </div>
        </div>
        <div class="content">
            <div class="container">
               <?php render($view) ?> 
            </div>
        </div>
        <div class="footer">
            <div class="container">
                &copy; Copyright 2015
            </div>
        </div>

        <script src="assets/js/main.js"></script>
    </body>
</html>