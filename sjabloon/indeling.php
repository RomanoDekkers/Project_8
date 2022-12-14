<?php if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} 
if(isset($_POST)){
  if(isset($_POST['LogoutConfirm'])){
          session_destroy();
          header("location: login.php");
      }
}?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schaakclub de blauwe loper</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel = "icon" href = 
"logo.jpg" 
        type = "image/x-icon">
<style>


  
</style>
</head>
<body>
    <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-left justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-left mb-2 mb-lg-0 text-dark text-decoration-none">
        <img src="logo.jpg" alt="logo" width="50" height="50">
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-left mb-md-0">
          <li><a href="index.php" class="nav-link px-2 link-dark">Home</a></li>
          <li><a href="Wedstrijd.php" class="nav-link px-2 link-dark">Wedstrijd</a></li>
          <?php if (isset($_SESSION["ingelogd"])){ 
            if ($_SESSION["Rechten"] == "3" || $_SESSION["Rechten"] == ""){?>
          <li><a href="Ledenlijst.php" class="nav-link px-2 link-dark">Ledenlijst</a></li>
          <?php } }?>
          <?php if (isset($_SESSION["ingelogd"])){ 
            if ( $_SESSION["Rechten"] == ""){?>
          <li><a href="Admin.php" class="nav-link px-2 link-dark">Admin</a></li>
          <?php } }?>
          <li><a href="contact.php" class="nav-link px-2 link-dark">Contact</a></li>
        </ul>

        
        <?php 
        //hier word gecheckt of de gebruiker is ingelogd zo ja dan zie hij een andere nav bar iedereen ziet een navbar want alle geintreseerde moeten dit kunnen zien
	if (isset($_SESSION["ingelogd"])){ ?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php //gebruikers naam word weergegeven
           echo $_SESSION["Voornaam"]; ?>
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="accountbeheer.php">account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Uitloggen</button>
			</li>
          </ul>
          <?php  } else{  ?>
          <div class="dropdown text-end">
          <a href="login.php" class="d-block link-dark text-decoration-none" >
          klik om in te loggen
          </a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Weet je zeker dat je wilt uitloggen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Nee</button>
        <form method='post'>
        <input type="submit" class="btn btn-success" id="btnSubmit" value="Ja" name="LogoutConfirm">
        </form>
      </div>
    </div>
  </div>
</div>
  </header>
</body>
</html>
