<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    include './sjabloon/indeling.php';
    include './connectie/conn.php';
    include './configs/functions.php';

    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $Onderwerp = $_POST['Onderwerp'];
        $Bericht = $_POST['Bericht'];
         mail("schaakclub.deblauweloper@gmail.com", $Onderwerp,
        $Bericht. $email);
    }

    ?>
<div class="container">
    <form action="" method="post" enctype="text/plain">
        <div class="mb-3">
            <label  class="form-label">Uw email address</label>
            <input type="email" class="form-control" placeholder="jou email" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label" >Onderwerp</label>
            <input type="text" name="Onderwerp" class="form-control">
        </div>
        <div class="mb-3">
            <label  class="form-label" >Bericht</label>
            <textarea class="form-control"  name="Bericht" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
        <input class="btn btn-success" type="submit" value="Verstuur">
        </div>
    </form>
</div>