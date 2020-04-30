<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
          <a class="nav-link" href="index.php?menu=home">Kezdőlap</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="index.php?menu=vevo">Vevők</a>
      </li>      
      <li class="nav-item">
          <a class="nav-link" href="index.php?menu=futar">Futár</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="index.php?menu=rendelesek">Rendelések</a>
      </li>   
      <?php
      if(isset($_SESSION['login']) && $_SESSION['login']){
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="index.php?menu=kilepes">Kilépés</a>';
          echo '</li> ';
      }
      ?>
      
          
          
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav>