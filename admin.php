<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    include './sjabloon/indeling.php';
    include './connectie/conn.php';
    include './configs/functions.php';
    //hier is een functie die de tabel met knopjes maakt 
    admintable();
    //als de delete knop ingedrukt word word hij verwijderd
    if(isset($_GET['aktie'])){
        if($_GET['aktie'] == "delete") {
            if(isset($_POST['delete']))
            {
                $ID = $_POST['ID'];
                $query ="DELETE FROM gebruikers WHERE ID = '$ID' limit 1";
                $conn->query($query);
                
                echo "<script type='text/javascript'> window.location.href='".$_SERVER['PHP_SELF']."'</script>";
            }
        }
    }
     //als de delete knop ingedrukt word word hij verwijderd
    if(isset($_GET['aktie'])){
        if($_GET['aktie'] == "update") {
            if(isset($_POST['update']))
            {   
                $rechten = $_POST['rol'];
                $ID = $_POST['ID'];
                $query ="UPDATE gebruikers SET rechten= '$rechten' WHERE ID ='$ID'";
                $conn->query($query);
                
                echo "<script type='text/javascript'> window.location.href='".$_SERVER['PHP_SELF']."'</script>";
            }
        }
    }
    ?>