<?php
//if(isset($_POST['username'])) ....
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password');
$futar = filter_input(INPUT_POST, 'futar', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
$errMsg ="";

if(filter_input(INPUT_POST, 'login', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
    //-- rákatintott a belépés gombra -----------
    try {
      if($futar){
            $sql = "SELECT `fazon`,`fnev`, `ftel` FROM `pfutar` WHERE `fnev`= ? AND `jelszo` = MD5(?)";
        } else {
            $sql = "SELECT `vazon`,`vnev`,`vcim` FROM `pvevo` WHERE `vnev` = ? AND `jelszo` = MD5(?)";
        }
        $stmt = $conn->prepare($sql); //-- parancs szövege
        $stmt->bind_param("ss", $username, $password); //-- szükséges paraméterek
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;
        $row = $result->fetch_assoc();
        if($count == 1 && !empty($row)){
            //-- Megtaláltuk a felhasználó adatait!
            if($futar){
                $_SESSION['user_id'] = $row['fazon'];
                $_SESSION['user_name'] = $row['fnev'];
                $_SESSION['telefon'] = $row['ftel'];
                header('Location: index.php?menu=futar');
                
            } else {
                $_SESSION['user_id'] = $row['vazon'];
                $_SESSION['user_name'] = $row['vnev'];
                $_SESSION['vevocim'] = $row['vcim'];
                header('Location: index.php?menu=vevo');
           }
            $_SESSION['login'] = true;
        } else {
            //-- Nem találhatók adatok!
            $errMsg = "Ilyen felhasználónév és jelszópáros nincs";
            $_SESSION['login'] = false;
        }
    } catch (mysqli_sql_exception $exc) {
        $errMsg = $exc->getTraceAsString();
        $_SESSION['login'] = false;
    }

}
?>
<div id="wrapper">
    <div id="loginForm" class="col-md-4 col-sm-8">
        <p><?php echo $errMsg; ?></p>
        <form action="" method="post">
            <div class="form-group">
              <label for="username">Felahsználónév</label>
              <input type="text" class="form-control" id="username" name="username" aria-describedby="NevHelp">
              <small id="NevHelp" class="form-text text-muted">A regisztrációnál megadott név.</small>
            </div>
            <div class="form-group">
              <label for="password">Jelszó</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="futar" name="futar">
              <label class="form-check-label" for="futar">Futár vagyok</label>
            </div>
            <button type="submit" class="btn btn-primary" name="login" value="1">Belépés</button>
        </form>
    </div>
</div>



