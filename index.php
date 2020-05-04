<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once './kapcsolat.php';
$menupont = filter_input(INPUT_GET, 'menu');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pizza Bar</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.5.0.min.js"></script>
        <link rel="stylesheet" href="css/pizzabar.css">
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
    </head>
    <body>
        <div class="container">
            <header>
                <h1><img src="images/PizzaLogo.png" class="d-none d-md-inline" > Beregszászi Pizza bár</h1>
            </header>
             <?php
                require_once 'menu.php';
                require_once 'tartalom.php';
            ?>
            <footer>
                <p>&copy; 2020 Boros Sándor</p>
            </footer>
        </div>
    </body>
</html>
