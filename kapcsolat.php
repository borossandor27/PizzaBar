<?php

$conn = mysqli_connect("localhost", "root", "", "pizzabar");

if (!$conn) {
    die("Az adatbázis nem elérhető: ".mysqli_connect_error());
}
$conn ->set_charset("utf8");
//echo 'adatbáziskapcsolat rendben!';
