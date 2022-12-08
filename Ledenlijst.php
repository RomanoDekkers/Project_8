<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    include './sjabloon/indeling.php';
    include './connectie/conn.php';
    include './configs/functions.php';

    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>

    <!--message alert-->
    <div class="container">
        <?php
        if(isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <a href="add_new.php" class="btn btn-primary mb-3">voeg toe</a>

     <!--table holder-->
<table class="table table-hover text-center">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Voorname</th>
      <th scope="col">Achtername</th>
      <th scope="col">Email</th>
      <th scope="col">Telefoonnummer</th>
      <th scope="col">Actie</th>
    </tr>
  </thead>
  <tbody>
        <!--read datebase-->
    <?php
        $sql = "SELECT * FROM `gebruikers`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
    <tr>
            <td><?php echo $row['ID'] ?></td>
            <td><?php echo $row['Voornaam'] ?></td>
            <td><?php echo $row['Achternaam'] ?></td>
            <td><?php echo $row['E-mail'] ?></td>
            <td><?php echo $row['Telefoonnummer'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['ID'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete.php?id=<?php echo $row['ID'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
    </tr>
        <?php
    }
    ?>
    
  </tbody>
</table>
    </div>

    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>