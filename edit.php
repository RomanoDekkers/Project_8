<?php
include './sjabloon/indeling.php';
include './connectie/conn.php';
include './configs/functions.php';
$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $id = $_POST['ID'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $sql = "UPDATE `gebruikers` SET `first_name`= '$first_name,`last_name`= '$last_name',`email`= '$email' WHERE ID=$id";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: index.php?msg=Data updated successfully");
    }

    else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>PHP CRUD</title>
</head>
<body>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Bewerkt een lid</h3>
            <p class="text-muted">Vul het formulier hier onder in</p>
        </div>

        <?php
            $sql = "SELECT * FROM `gebruikers`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        
        <?php
    }
    ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                    <input type="hidden" class="form-control" name="ID" value="<?php echo $row['ID'] ?>">
                        <label class="form-label">Voornaam:</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Achternaam:</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">

                    <div class="col">
                        <label class="form-label">Telefoonnummer:</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary" name="submit">bewerk</button>
                    <a href="index.php" class="btn btn-danger">annueleren</a>
                </div>
            
            </form>
        </div>
    </div>
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>