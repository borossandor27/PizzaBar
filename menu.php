


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <ul class="navbar-nav mr-auto">
       
      <li class="nav-item <?php echo $menupont == "vevo"?"active":"";?>">
          <a class="nav-link<?php echo $_SESSION['login']?'" href="index.php?menu=vevo"':' disabled" tabindex="-1" aria-disabled="true"'; ?> >Vevők</a>
      </li>      
      <li class="nav-item <?php echo $menupont == "futar"?"active":"";?>">
          <a class="nav-link<?php echo $_SESSION['login']?'" href="index.php?menu=futar"':' disabled" tabindex="-1" aria-disabled="true"' ?> >Futár</a>
      </li>
      <li class="nav-item <?php echo $menupont == "rendelesek"?"active":""; ?>">
          <a class="nav-link<?php echo $_SESSION['login']?'" href="index.php?menu=rendelesek"':' disabled" tabindex="-1" aria-disabled="true"' ?> >Rendelések</a>
      </li>  
      <?php
      if($_SESSION['login']){
          ?>
          <li class="nav-item <?php echo $menupont == "kilepes"?"active":""; ?>">
              <a class="nav-link" href="index.php?menu=kilepes">Kilépés</a>
          </li>
          <?php
      }
      ?>
    </ul>
  </div>
</nav>