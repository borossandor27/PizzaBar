<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once './kapcsolat.php';
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = false; //-- ha nem létezik, akkor létrehozzuk
}
$menupont = filter_input(INPUT_GET, 'menu', FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pizza Bar</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.5.0.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <script src="js/bootstrap.min.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
        <script src="js/popper.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
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
